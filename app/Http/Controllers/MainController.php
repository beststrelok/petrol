<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Quotation;
use Region;
use Goutte\Client;
use Carbon;

class MainController extends Controller {
	public function index() {
		$quotations = Quotation::joined()->get();
		return v()->with(compact('quotations'));
	}

	public function parse() {
		$url = 'http://korrespondent.net/business/indexes/fuel/';
		$client = new Client();
		$crawler = $client->request('GET', $url);
		$rows = count($crawler->filter('#sort_table_569 tbody tr'));
		$data = [];
		$time = Carbon::now();


		foreach (range(0, $rows-1) as $row) {
			$quotation = [];
			$region = $crawler->filter('#sort_table_569 tbody tr')->eq($row);
			$region_title = $region->filter('td')->eq(0)->html();
			$region_id = Region::where('region_title', $region_title)->lists('region_id')[0];
			
			$quotation_A76_80 = [
				'price'		=> $region->filter('td')->eq(1)->html(),
				'petrol'	=> 'A76/80',
				'region_id' => $region_id,
				'added_on'	=> $time,
			];
			$quotation_A92 = [
				'price'		=> $region->filter('td')->eq(2)->html(),
				'petrol'	=> 'A92',
				'region_id' => $region_id,
				'added_on'	=> $time,
			];
			$quotation_A95 = [
				'price'		=> $region->filter('td')->eq(3)->html(),
				'petrol'	=> 'A95',
				'region_id' => $region_id,
				'added_on'	=> $time,
			];

			$data[] = $quotation_A76_80;
			$data[] = $quotation_A92;
			$data[] = $quotation_A95;
		}

		Quotation::insert($data);

		return redirect()->route('index');
	}




	public function about() {
		return v();
	}

	public function contacts() {
		return v();
	}

	// ADMIN
	public function admin() {
		if (Auth::check()) {
			return v();
		} else {
			return redirect()->route('admin_login');
		}
	}

	public function admin_catalog() {
		$kinds = Kind::every();
		return v()->with(compact('kinds'));
	}

	// ADMIN
	public function admin_login() {
		if (Auth::check()) {
			return redirect()->route('admin');
		} else {
			return v();
		}
	}

	// ADMIN
	public function admin_logging() {
		$data = Request::all();
		unset($data['_token']);

		$pass = Auth::attempt($data, true);
		if ($pass) {
			return redirect()->route('admin');
		} else {
			return redirect()->route('admin_login')->withErrors('Неверный логин или пароль!');
		}
	}

	// ADMIN
	public function admin_logout() {
		Auth::logout();
		return redirect()->route('admin_login');
	}

	public function search() {
		$kind_id = Request::input('kind_id');
		$param = Request::input('param');
		if (! empty($kind_id)) {
			$items = Item::joined()->byKind($kind_id)->search($param)->get();
		} else {
			$items = Item::joined()->search($param)->get();
		}

		return v()->with(compact('items'));
	}
}
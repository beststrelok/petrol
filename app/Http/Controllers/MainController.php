<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Quotation;
use Goutte\Client;

class MainController extends Controller {
	public function index() {
		$quotations = Quotation::joined()->get();
		return v()->with(compact('quotations'));
	}

	public function parse() {
		$url = 'http://korrespondent.net/business/indexes/fuel/';
		$quotation = [];

		$client = new Client();
		// $client = new Client();
		$crawler = $client->request('GET', $url);
		$rows = count($crawler->filter('#sort_table_569 tbody tr'));

		foreach (range(0, $rows-1) as $row) {
			$crawler->filter('#sort_table_569 tbody tr')->eq($row)->html();
		}

		// A76/80
		// A92
		// A95
		$quotation['region_title'] = $crawler->filter('#sort_table_569');
		$crawler->filter('.dataTable tbody tr')->first()->filter('td')->eq(0)->text();

		

		// PRICE
		$price = 
		$data['price'] = $price;

		// HIGH
		$high = $crawler->filter('.commonTable')->eq(0)->filter('tbody td')->eq(1)->text();
		$data['high'] = $high;

		// LOW
		$low = $crawler->filter('.commonTable')->eq(0)->filter('tbody td')->eq(2)->text();
		$data['low'] = $low;

		// VOLUME
		$volume = $crawler->filter('.commonTable')->eq(0)->filter('tbody td')->eq(3)->text();
		$volume = str_replace(",", "", $volume);
		$data['volume'] = $volume;

		// DELTA
		$delta = $crawler->filter('.commonTable')->eq(0)->filter('tbody td')->eq(5)->text();
		$delta = $this->stringify($delta);
		$data['delta'] = $delta;

		// DATE
		$data['date'] = Carbon::now();

		Price::create($data);
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
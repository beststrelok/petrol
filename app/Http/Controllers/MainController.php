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
		$quotations = Quotation::joined()->today()->get();
		return v()->with(compact('quotations'));
	}

	public function parse() {
		$time = Carbon::today();
		Quotation::where('added_on', $time)->delete();
		
		$url = 'http://korrespondent.net/business/indexes/fuel/';
		$client = new Client();
		$crawler = $client->request('GET', $url);
		$rows = count($crawler->filter('#sort_table_569 tbody tr'));
		$data = [];

		foreach (range(0, $rows-1) as $row) {
			$quotation = [];
			$region = $crawler->filter('#sort_table_569 tbody tr')->eq($row);
			$region_title = $region->filter('td')->eq(0)->html();
			$region_id = Region::where('region_title', $region_title)->lists('region_id')[0];
			
			$quotation = [
				'A76_80'	=> $region->filter('td')->eq(1)->html(),
				'A92'	=> $region->filter('td')->eq(2)->html(),
				'A95'	=> $region->filter('td')->eq(3)->html(),
				'region_id' => $region_id,
				'added_on'	=> $time,
			];

			$data[] = $quotation;
		}

		Quotation::insert($data);

		return redirect()->route('index');
	}

	public function ajax_set_date() {
		$date_str = Request::input('date');
		$date = Carbon::parse(str_replace('/', '-', $date_str));
		$quotations = Quotation::joined()->where('added_on', $date)->get();
		return $quotations;
	}
}
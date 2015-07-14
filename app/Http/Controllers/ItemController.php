<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Request;
use Item;
use Unit;
use Kind;
use Producer;
use Filter;

class ItemController extends Controller {
	public function add_item() {
		$producers = Producer::all();
		$kinds = Kind::every();
		$units = Unit::all();
		return v()->with(compact('producers', 'kinds', 'units'));
	}

	public function create_item() {
		$data = Request::all();
		unset($data['_token']);
		$element = Item::create($data);
		return redirect()->back()->with('message', "Товар \"{$element->title}\" #{$element->item_id} добавлен успешно!");
	}

	// VC
	public function admin_items() {
		$filter = Filter::byKind($id);
		$items = Item::joined()->byKind($id);
		return v()->with(compact('items', 'filters'));
	}

	public function ajax_items($filters='') {
		// $take = Request::input('take');
		// $page = Request::input('page');
		// $sort = Request::input('sort');
		// $order = Request::input('order');
		// $skip = $take*($page-1);

		// // improve max and min for range filters
		// // if ('range' == get_filter_type($filter)) {}

		// $query = Item::joined(); // get Illuminate\Database\Eloquent\Builder
		// $query = apply_filters($query, $filters); // $query = Filter::apply($query, $filters);
		// $query = $query->orderBy($sort, $order);
		// $estates = $query->skip($skip)->take($take)->get();

		// return response()->json($estates);
	}

	// VC
	public function items() {
		$filter = Filter::byKind($id);
		$items = Item::joined()->byKind($id);
		return v()->with(compact('items', 'filters'));
	}

	// joined
	public function item($id) {
		// add to recent
		$item = Item::find($id);
		// $recents = Item::joined()->whereIn('item_id', Session::get('items'))->get();
		return v()->with('item', 'recents');
	}

	public function change_item($id) {
		$producers = Producer::all();
		$kinds = Kind::every();
		$units = Unit::all();
		$item = Item::find($id);
		return v()->with(compact('item', 'producers', 'kinds', 'units'));
	}

	public function update_item() {
		$data = Request::all();
		unset($data['_token']);
		$item = Item::find($data['item_id'])->update($data);
		return redirect()->back()->with('message', "Товар \"{$item->title}\" #{$item->item_id} изменен успешно!");
	}

	public function delete_item() {
		$item = Item::find($item_id);
		$item->delete();
		return redirect()->back()->with('message', "Товар \"{$item->title}\" #{$item->item_id} удален успешно!");
	}
}
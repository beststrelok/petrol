<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Filter;

class FilterController extends Controller {
	public function create_filter() {
		$data = Request::all();
		unset($data['_token']);
		${ucfirst('filter')}::create($data);
		return redirect()->back()->with('message', "Фильтр \"{$filter->title}\" #{$filter->filter_id} добавлен успешно!");
	}

	public function admin_filters() {
		$filters = ${ucfirst('filter')}::all();
		return v()->with(compact('filters')); 
	}

	public function update_filter() {
		$data = Request::all();
		return redirect()->back()->with('message', "Фильтр \"{$filter->title}\" #{$filter->filter_id} изменен успешно!");
	}

	public function delete_filter($filter_id) {
		$filter = ${ucfirst('filter')}::find($filter_id);
		$filter->delete();
		return redirect()->back()->with('message', "Фильтр \"{$filter->title}\" #{$filter->filter_id} удален успешно!");
	}
}
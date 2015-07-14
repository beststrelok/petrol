<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Unit;

class UnitController extends Controller {
	public function unit() {
		$data = Request::all();
		unset($data['_token']);
		${ucfirst('unit')}::create($data);
		return redirect()->back()->with('message', "Единица измерения \"{$unit->title}\" #{$unit->unit_id} добавлена успешно!");
	}

	public function units() {
		$units = ${ucfirst('unit')}::all();
		return v()->with(compact('units')); 
	}

	public function unit() {
		$data = Request::all();
		return redirect()->back()->with('message', "Единица измерения \"{$unit->title}\" #{$unit->unit_id} изменена успешно!");
	}

	public function unit($unit_id) {
		$unit = ${ucfirst('unit')}::find($unit_id);
		$unit->delete();
		return redirect()->back()->with('message', "Единица измерения \"{$unit->title}\" #{$unit->unit_id} удалена успешно!");
	}
}
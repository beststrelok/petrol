<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Kind;

class KindController extends Controller {
	public function create_kind() {
		$data = Request::all();
		unset($data['_token']);
		${ucfirst('kind')}::create($data);
		return redirect()->back()->with('message', "Подкатегория \"{$kind->title}\" #{$kind->kind_id} добавлен успешно!");
	}

	public function admin_kinds() {
		$kinds = ${ucfirst('kind')}::all();
		return v()->with(compact('kinds')); 
	}

	public function update_kind() {
		$data = Request::all();
		return redirect()->back()->with('message', "Подкатегория \"{$kind->title}\" #{$kind->kind_id} изменен успешно!");
	}

	public function delete_kind($kind_id) {
		$kind = ${ucfirst('kind')}::find($kind_id);
		$kind->delete();
		return redirect()->back()->with('message', "Подкатегория \"{$kind->title}\" #{$kind->kind_id} удален успешно!");
	}
}
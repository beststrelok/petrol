<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use New;

class NewController extends Controller {
public function add_new() {
		return v();
	}
	
	public function create_new() {
		$data = Request::all();
		unset($data['_token']);
		${ucfirst('new')}::create($data);
		return redirect()->back()->with('message', "Новость \"{$new->title}\" #{$new->new_id} добавлена успешно!");
	}

	public function admin_news() {
		// ??? use view composer ???
		$news = ${ucfirst('new')}::all();
		return v()->with(compact('news'));
	}

	public function news() {
		// ??? use view composer ???
		$news = ${ucfirst('new')}::all();
		return v()->with(compact('news'));
	}

	public function new($new, $new_id) {
		// ??? use view composer ???
		$new = ${ucfirst('new')}::find($new_id);
		return v()->with(compact('new'));
	}

	public function change_new($new_id) {
		// ??? use view composer ???
		$new = ${ucfirst('new')}::find($new_id);
		return v()->with(compact('new'));
	}

	public function update_new() {
		$data = Request::all();
		unset($data['_token']);
		$estate = ${ucfirst('new')}::find($data['new_id'])->update($data);
		return redirect()->back()->with('message', "Новость \"{$new->title}\" #{$new->new_id} изменена успешно!");
	}

	public function delete_new($new_id) {
		$new = ${ucfirst('new')}::find($new_id);
		$new->delete();
		return redirect()->back()->with('message', "Новость \"{$new->title}\" #{$new->new_id} удалена успешно!");
	}
}
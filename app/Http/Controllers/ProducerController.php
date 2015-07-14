<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Producer;

class ProducerController extends Controller {
	public function create_producer() {
		$data = Request::all();
		unset($data['_token']);
		${ucfirst('producer')}::create($data);
		return redirect()->back()->with('message', "Производитель \"{$producer->title}\" #{$producer->producer_id} добавлен успешно!");
	}

	public function admin_producers() {
		$producers = ${ucfirst('producer')}::all();
		return v()->with(compact('producers')); 
	}

	public function update_producer() {
		$data = Request::all();
		return redirect()->back()->with('message', "Производитель \"{$producer->title}\" #{$producer->producer_id} изменен успешно!");
	}

	public function delete_producer($producer_id) {
		$producer = ${ucfirst('producer')}::find($producer_id);
		$producer->delete();
		return redirect()->back()->with('message', "Производитель \"{$producer->title}\" #{$producer->producer_id} удален успешно!");
	}
}
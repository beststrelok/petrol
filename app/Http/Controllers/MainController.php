<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Kind;
use Request;

class MainController extends Controller {
	public function index() {
		$kinds = Kind::top2();
		return v()->with(compact('kinds'));
	}

	public function delivery() {
		return v();
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
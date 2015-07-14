<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function admin_users() {

	}

	// USER
	public function logging() {
		$data = Request::all();
		unset($data['_token']);

		$pass = Auth::attempt($data, true);
		if ($pass) {
			return redirect()->route('admin');
		} else {
			return redirect()->route('admin_login')->withErrors('Неверный логин или пароль!');
		}
	}

	// USER
	public function logout() {
		Auth::logout();
		return redirect()->route('admin_login');
	}

	// USER
	public function cabinet() {
		$user = Auth::user();
		return v()->with(compact('user'));
	}

	public function register_page() {
		return v();
	}

	// use REQUEST
	public function registration() {
		// $data = Request::all();
		// $rules = [
		// 	'name'		=> 'required|between:1,64',
		// 	'surname'	=> 'required|between:1,64',
		// 	'company'	=> 'between:1,64',
		// 	'email'		=> 'required|email|between:6,64|unique:users',
		// 	'phone'		=> 'required|between:1,32',
		// 	'activity'	=> 'required|between:1,32',
		// 	'password'	=> 'required|between:6,128',
		// 	'confirm' 	=> 'required|same:password',
		// ];

		// $validator = Validator::make($data, $rules);

		// if ($validator->fails()) {
		// 	return Redirect::back()
		// 		->withInput()
		// 			->withErrors($validator->errors());
		// } else {
		// 	unset($data['confirm']);
		// 	$data['password'] = Hash::make($data['password']);
		// 	User::create($data);
		// 	return Redirect::to('/')
		// 		->with('message', 'Вы успешно зарегестрированы, '.$data['name'].' '.$data['surname']);
		// }
	}

	public function forgot_pass() {
		$data['email'] = Request::input('email');

		$user = User::where('email', $email)->first();
		if (0 == count($user)) {
			return redirect()->route('login')->withErrors('Пользователя с таким email адресом не существует!');
		} else {
			$data['hash'] = str_random(128);
			$user->reminder = $data['hash'];
			$user->save();

			Mail::send('emails.password', $data, function($mail) use ($data) {
				$mail->to($data['email'])->subject('Восстановление пароля.');
			});

			return redirect()->route('login')->with('message', "На вашу почту {$data['email']} было отправлено письмо с восстановление пароля!");
		}
	}

	public function reset_pass($hash) {
		$user = User::where('reminder', $hash)->first();
		if (0 == count($user)) {
			return redirect()->route('login');
		} else {
			Auth::login($user);
			return redirect()->route('cabinet');
		}
	}
}
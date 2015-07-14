<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OrderController extends Controller {
	public function admin_orders() {
		$orders = Order::all();
		return v()->with(compact('orders'));
	}

	public function delete_order() {
		$order_id = Request::input('order_id');
		$order = ${ucfirst('order')}::find($order_id);
		$order->delete();
		return redirect()->back()->with('message', "Заказ \"{$order->title}\" #{$order->order_id} удален успешно!");
	}

	public function order() {
		$data = Request::all();
		unset($data['_token']);

		$order = ${ucfirst('order')}::create([
			'user_id' 		=> Auth::user()->user_id,
			// 'cart'	  		=> json_encode(Cart::items()),
			'ordered_at'	=> time(),
			'comment'		=> $data['comment'],
		]);

		Mail::send('emails.order', $data, function ($mail) use ($data) {
			$mail->to($data['email'], $data['name'])->subject("Ваш заказ #{$order->order_id} оформлен успешно!");
		});

		return redirect()->back()->with('message', "Ваш заказ #{$order->order_id} оформлен успешно!");
	}

	public function order_page($id) {
		if (Auth::check()) {
			$item = Item::find($id);
			return v()->with(compact('item'));
		} else {
			return redirect()->route('login');
		}
	}
}
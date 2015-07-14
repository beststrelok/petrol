<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class EstateViewComposer {
	public function __construct() {
		// dependency injection goes here
	}

	public function compose(View $view) {
		// if ('estates' == $view->getName()) {
		// 	$view->with('test', 'This is test ViewComposer variable.');
		// } elseif ('estate' == $view->getName()) {
		// 	$view->with('test', 'Single Estate ViewComposer.');
		// }
	}
}
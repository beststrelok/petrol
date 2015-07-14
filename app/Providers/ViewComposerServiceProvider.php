<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Estate;
use Town;
use Image;

class ViewComposerServiceProvider extends ServiceProvider {
	public function boot() {
		// ESTATES
		// view()->composer(['estates', 'admin/estates'], function($view) {
		// 	$towns = Town::whereHas('districts', function ($q) {$q->has('estates');})->with('districts')->get();
		// 	$estates = Estate::with(['images'=>function($q){$q->where('preview',1);}])->where('type', 'flat')->where('commercial', 'sale')->take(30)->get()->flate();

		// 	$extremes = [
		// 		'price_min' 		=> Estate::min('price'),
		// 		'price_max' 		=> Estate::max('price'),
		// 		'sea_dist_min' 		=> Estate::min('sea_dist'),
		// 		'sea_dist_max' 		=> Estate::max('sea_dist'),
		// 		'house_area_min' 	=> Estate::min('house_area'),
		// 		'house_area_max' 	=> Estate::max('house_area'),
		// 		'rooms_min'			=> Estate::min('rooms'),
		// 		'rooms_max'			=> Estate::max('rooms'),
		// 		'yard_area_min'	 	=> Estate::min('yard_area'),
		// 		'yard_area_max' 	=> Estate::max('yard_area'),
		// 	];

		// 	$view->with(compact('extremes', 'towns', 'estates'));
		// });

		// // ESTATE
		// view()->composer('estate', function($view) {
		// 	$data = $view->getData();
		// 	$estate = Estate::where('estate_id', $data['estate_id'])->with('images')->first();

		// 	$view->with(compact('estate'));
		// });




		// view()->share('data', [1, 2, 3]);
		// $this->composeEstates();

		// view()->composers([
		// 	'App\Http\ViewComposers\EstateViewComposer' => ['estates', 'estate'],
		// 	'App\Http\ViewComposers\UserComposer' => 'user',
		// 	'App\Http\ViewComposers\ProductComposer' => 'product',
		// ]);
	}

	public function register() {}

	// private function composeEstates() { 
		// view()->composer('estates', 'App\Http\ViewComposers\EstateViewComposer');
		// view()->composer(['estates', 'estate'], 'App\Http\ViewComposers\EstateViewComposer@compose');

		// view()->composer('estates', function($view) { 
		// 	$view->with('test', 'This is test ViewComposer variable.');
		// });
		// view()->composer(['estates', 'estate'], function($view) { 
		// 	$view->with('test', 'This is test ViewComposer variable.');
		// });	

		// view()->composers([
			// 'App\Http\ViewComposers\EstateViewComposer' => ['estates', 'estate'],
			// 'App\Http\ViewComposers\UserComposer' => 'user',
			// 'App\Http\ViewComposers\ProductComposer' => 'product',
		// ]);
	// }
}
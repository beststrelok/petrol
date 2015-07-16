<?php
// php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"

// Schema::getColumnListing('users');
// MOU - readme.md

// +++ 1. create gliffy ER with relations 
// +++ 2. create routes with names 
// +++ 3. assign views to routes 
// 4. create views
// +++ 5. create migrations 
// 6. create models with relations + deleting events + trimmable + getDates()
// 7. create seeders 
// +++ 8. create controllers 
// 9. set up ViewComposer 
// 10. write tests for routes

// MAIN PAGE
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/', ['as'=>'index', 'uses'=>'MainController@index']); // index
Route::post('/parse', ['as'=>'parse', 'uses'=>'MainController@parse']);

Route::group(['middleware' => 'cors'], function () {
	 Route::get('/ajax_set_date', ['as'=>'ajax_set_date', 'uses'=>'MainController@ajax_set_date']);
});


// App::missing(function($exception) {
// 	return Redirect::to('/');
// });
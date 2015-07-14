<?php
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

// ITEMS
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/admin/add_item', 			['as'=>'add_item', 		'uses'=>'ItemController@add_item', 		'middleware'=>'auth'	]); // admin/add_item
Route::post('/admin/create_item', 		['as'=>'create_item', 	'uses'=>'ItemController@create_item', 	'middleware'=>'auth'	]); // redirect
Route::get('/admin/items', 				['as'=>'admin_items', 	'uses'=>'ItemController@admin_items', 	'middleware'=>'auth'	]); // admin/items
Route::post('/ajax/{filters?}',			['as'=>'ajax_items',  	'uses'=>'ItemController@ajax_items'								]); // ajax $items
Route::get('/items', 					['as'=>'items', 		'uses'=>'ItemController@items'									]); // items
Route::get('/items/{item}/{id}',		['as'=>'item', 			'uses'=>'ItemController@item'									]); // item
Route::get('/admin/items/{id}', 		['as'=>'change_item', 	'uses'=>'ItemController@change_item', 	'middleware'=>'auth'	]); // change_item
Route::post('/admin/items/update', 		['as'=>'update_item', 	'uses'=>'ItemController@update_item', 	'middleware'=>'auth'	]); // redirect
Route::post('/admin/items/delete/{id}', ['as'=>'delete_item', 	'uses'=>'ItemController@delete_item', 	'middleware'=>'auth'	]); // redirect


// ARTICLES
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/admin/add_article', 			['as'=>'add_article', 		'uses'=>'ArticleController@add_article', 		'middleware'=>'auth'	]); // admin/add_article
Route::post('/admin/create_article', 		['as'=>'create_article', 	'uses'=>'ArticleController@create_article', 	'middleware'=>'auth'	]); // redirect
Route::get('/admin/articles', 				['as'=>'admin_articles', 	'uses'=>'ArticleController@admin_articles', 	'middleware'=>'auth'	]); // admin/articles
Route::get('/articles', 					['as'=>'articles', 			'uses'=>'ArticleController@articles'									]); // articles
Route::get('/articles/{article}/{id}',		['as'=>'article', 			'uses'=>'ArticleController@article'										]); // article
Route::get('/admin/articles/{id}', 			['as'=>'change_article', 	'uses'=>'ArticleController@change_article', 	'middleware'=>'auth'	]); // change_article
Route::post('/admin/articles/update', 		['as'=>'update_article', 	'uses'=>'ArticleController@update_article', 	'middleware'=>'auth'	]); // redirect
Route::post('/admin/articles/delete/{id}', 	['as'=>'delete_article', 	'uses'=>'ArticleController@delete_article', 	'middleware'=>'auth'	]); // redirect

// NEWS
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/admin/add_new', 			['as'=>'add_new', 		'uses'=>'NewController@add_new', 		'middleware'=>'auth'	]); // admin/add_new
Route::post('/admin/create_new', 		['as'=>'create_new', 	'uses'=>'NewController@create_new', 	'middleware'=>'auth'	]); // redirect
Route::get('/admin/news', 				['as'=>'admin_news', 	'uses'=>'NewController@admin_news', 	'middleware'=>'auth'	]); // admin/news
Route::get('/news', 					['as'=>'news', 			'uses'=>'NewController@news'									]); // news
Route::get('/news/{new}/{id}',			['as'=>'new', 			'uses'=>'NewController@new'										]); // new
Route::get('/admin/news/{id}', 			['as'=>'change_new', 	'uses'=>'NewController@change_new', 	'middleware'=>'auth'	]); // change_new
Route::post('/admin/news/update', 		['as'=>'update_new', 	'uses'=>'NewController@update_new', 	'middleware'=>'auth'	]); // redirect
Route::post('/admin/news/delete/{id}', 	['as'=>'delete_new', 	'uses'=>'NewController@delete_new', 	'middleware'=>'auth'	]); // redirect

// PRODUCERS
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::post('/admin/create_producer', 		['as'=>'create_producer', 	'uses'=>'ProducerController@create_producer', 	'middleware'=>'auth'	]); // redirect
Route::get('/admin/producers', 				['as'=>'admin_producers', 	'uses'=>'ProducerController@admin_producers', 	'middleware'=>'auth'	]); // admin/producers
Route::post('/admin/producers/update', 		['as'=>'update_producer', 	'uses'=>'ProducerController@update_producer', 	'middleware'=>'auth'	]); // redirect
Route::post('/admin/producers/delete/{id}', ['as'=>'delete_producer', 	'uses'=>'ProducerController@delete_producer', 	'middleware'=>'auth'	]); // redirect

// ORDERS
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/admin/orders', 				['as'=>'admin_orders', 	'uses'=>'OrderController@admin_orders', 	'middleware'=>'auth'	]); // admin/orders
Route::post('/admin/orders/delete/{id}', 	['as'=>'delete_order', 	'uses'=>'OrderController@delete_order', 	'middleware'=>'auth'	]); // redirect
Route::get('/order_page/{id}', 				['as'=>'order_page', 	'uses'=>'OrderController@order_page'								]); // order_page
Route::post('/order',						['as'=>'order', 		'uses'=>'OrderController@order', 		'middleware'=>'auth'		]); // redirect


// UNITS
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::post('/admin/create_unit', 		['as'=>'create_unit', 	'uses'=>'UnitController@create_unit', 	'middleware'=>'auth'	]); // redirect
Route::get('/admin/units', 				['as'=>'admin_units', 	'uses'=>'UnitController@admin_units', 	'middleware'=>'auth'	]); // admin/units
Route::post('/admin/units/update', 		['as'=>'update_unit', 	'uses'=>'UnitController@update_unit', 	'middleware'=>'auth'	]); // redirect
Route::post('/admin/units/delete/{id}', ['as'=>'delete_unit', 	'uses'=>'UnitController@delete_unit', 	'middleware'=>'auth'	]); // redirect

// FEEDBACKS
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/admin/feedbacks', 				['as'=>'admin_feedbacks', 	'uses'=>'FeedbackController@admin_feedbacks', 	'middleware'=>'auth'	]); // admin/feedbacks
Route::post('/admin/feedbacks/delete/{id}', ['as'=>'delete_feedback', 	'uses'=>'FeedbackController@delete_feedback', 	'middleware'=>'auth'	]); // redirect
Route::post('/feedback',					['as'=>'feedback', 			'uses'=>'FeedbackController@feedback'									]); // redirect

// KINDS
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::post('/admin/create_kind', 		['as'=>'create_kind', 	'uses'=>'KindController@create_kind', 	'middleware'=>'auth'	]); // redirect
Route::get('/admin/kinds', 				['as'=>'admin_kinds', 	'uses'=>'KindController@admin_kinds', 	'middleware'=>'auth'	]); // admin/kinds
Route::post('/admin/kinds/update', 		['as'=>'update_kind', 	'uses'=>'KindController@update_kind', 	'middleware'=>'auth'	]); // redirect
Route::post('/admin/kinds/delete/{id}', ['as'=>'delete_kind', 	'uses'=>'KindController@delete_kind', 	'middleware'=>'auth'	]); // redirect

// FILTRES
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::post('/admin/create_filter', 		['as'=>'create_filter', 	'uses'=>'FilterController@create_filter', 	'middleware'=>'auth'	]); // redirect
Route::get('/admin/filters', 				['as'=>'admin_filters', 	'uses'=>'FilterController@admin_filters', 	'middleware'=>'auth'	]); // admin/filters
Route::post('/admin/filters/update', 		['as'=>'update_filter', 	'uses'=>'FilterController@update_filter', 	'middleware'=>'auth'	]); // redirect
Route::post('/admin/filters/delete/{id}', 	['as'=>'delete_filter', 	'uses'=>'FilterController@delete_filter', 	'middleware'=>'auth'	]); // redirect

// USERS
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/admin/users', 			['as'=>'admin_users', 	'uses'=>'UserController@admin_users', 	'middleware'=>'auth'	]); // admin/users
Route::post('/logging', 			['as'=>'logging', 		'uses'=>'UserController@logging'		]); // redirect
Route::post('/logout', 				['as'=>'logout', 		'uses'=>'UserController@logout'	, 	'middleware'=>'auth'	]); // redirect
Route::get('/cabinet',				['as'=>'cabinet', 		'uses'=>'UserController@cabinet', 	'middleware'=>'auth'	]); // cabinet
Route::post('/forgot_pass',			['as'=>'forgot_pass', 	'uses'=>'UserController@forgot_pass', 	'middleware'=>'auth'	]); // redirect
Route::get('/reset_pass/{hash}',	['as'=>'reset_pass', 	'uses'=>'UserController@reset_pass'		]); // reset_pass
Route::get('/register_page',		['as'=>'register_page', 'uses'=>'UserController@register_page'	]); // register_page
Route::post('/registration',		['as'=>'registration', 	'uses'=>'UserController@registration'	]); // redirect

// STATIC PAGES
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/delivery', 	['as'=>'delivery', 		'uses'=>'MainController@delivery'	]); // delivery
Route::get('/about', 		['as'=>'about', 		'uses'=>'MainController@about'		]); // about
Route::get('/contacts',  	['as'=>'contacts', 		'uses'=>'MainController@contacts'	]); // contacts

// INTERACTIONS
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/admin', 			['as'=>'admin', 		'uses'=>'MainController@admin'			]); // admin
Route::get('/admin_catalog', 	['as'=>'admin_catalog', 'uses'=>'MainController@admin_catalog', 	'middleware'=>'auth'	]); // admin_catalog
Route::get('/admin_login', 		['as'=>'admin_login', 	'uses'=>'MainController@admin_login'	]); // admin_login
Route::post('/admin_logging', 	['as'=>'admin_logging', 'uses'=>'MainController@admin_logging'	]); // redirect
Route::post('/admin_logout', 	['as'=>'admin_logout', 	'uses'=>'MainController@admin_logout', 	'middleware'=>'auth'	]); // redirect
Route::post('/search', 			['as'=>'search', 		'uses'=>'MainController@search'				]); // redirect




// App::missing(function($exception) {
// 	return Redirect::to('/');
// });
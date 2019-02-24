<?php

Route::prefix('products')->name('products.')->group(function() {
	
	Route::get('', 'ProductsController@index')->name('index');

	Route::get('/{type}/{product}/{color}', 'ProductsController@show')->name('show');

	Route::post('/notify', 'ProductsController@notify')->name('notify');

	Route::prefix('reviews')->name('reviews.')->group(function() {

		Route::post('', 'ReviewsController@store')->middleware('throttle:1')->name('store');

	});

});

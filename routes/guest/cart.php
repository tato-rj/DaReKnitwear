<?php

Route::prefix('cart')->name('cart')->group(function() {

	Route::get('', 'CartController@index');

	Route::get('show', 'CartController@show')->name('.show');

	Route::post('add', 'CartController@add')->name('.add');

	Route::post('delete', 'CartController@delete')->name('.delete');

	Route::post('delete-all', 'CartController@deleteAll')->name('.delete-all');

	Route::prefix('checkout')->name('.checkout')->group(function() {

		Route::get('customer-information', 'CheckoutController@customer')->name('.step1');

		Route::get('shipping-method', 'CheckoutController@shipping')->name('.step2');

		Route::get('payment-method', 'CheckoutController@payment')->name('.step3');

		Route::post('purchase', 'CheckoutController@purchase')->name('.purchase');

	});
});

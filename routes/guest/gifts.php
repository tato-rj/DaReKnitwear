<?php

Route::prefix('gifts')->name('gifts')->group(function() {
	
	Route::get('', 'ProductsController@gifts');

});

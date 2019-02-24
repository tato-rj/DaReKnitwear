<?php

Route::prefix('about')->name('about')->group(function() {
	
	Route::get('', 'HomeController@about');

});

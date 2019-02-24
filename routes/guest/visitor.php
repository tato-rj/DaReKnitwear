<?php

Route::prefix('visitor')->name('visitor')->group(function() {
	
	Route::post('', 'VisitorsController@store')->name('.store');

});

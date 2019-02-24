<?php

Route::post('wishlist', function(\Illuminate\Http\Request $request) {
	return response(200);
})->name('wishlist.update');

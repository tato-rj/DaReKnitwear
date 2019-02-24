<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'last_login_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Visitor::class, function (Faker $faker) {
    return [
        'visitor_id' => codes()->visitorId(),
        'last_login_at' => now()
    ];
});

$factory->define(App\Supplier::class, function(Faker $faker) {
	return [
		'name' => $faker->word
	];
});

$factory->define(App\Sweater::class, function (Faker $faker) {
	$discounts = [null, null, null, null, 10, 20, 50];

	return [
		'slug' => str_slug($faker->sentence),
		'name' => $faker->sentence,
		'description' => $faker->paragraph,
		'price' => $faker->numberBetween(125,400),
		'discount' => $discounts[array_rand($discounts)],
		'supplier_id' => function() {
			return create('App\Supplier')->id;
		}
	];
});

$factory->define(App\Inventory::class, function (Faker $faker) {
	$sweater = create('App\Sweater');

	return [
		'sku' => codes()->sku($sweater, $faker->word, $faker->word),
		'item_id' => codes()->itemId(1),
		'size' => $faker->word,
		'color' => $faker->word,
		'product_id' => function() use ($sweater) {
			return $sweater->id;
		},
		'product_type' => function() use ($sweater) {
			return get_class($sweater);
		}
	];
});

$factory->define(App\Cart::class, function (Faker $faker) {
	return [
		'customer_id' => function() {
			return create('App\User')->id;
		},
		'customer_type' => function() {
			return get_class(create('App\User'));
		},
		'item_id' => function() {
			return create('App\Inventory')->id;
		}
	];
});

$factory->define(App\Review::class, function(Faker $faker) {
	return [
		'reviewable_type' => function() {
			return get_class(create('App\Sweater'));
		},
		'reviewable_id' => function() {
			return create('App\Sweater')->id;
		},
		'name' => $faker->name,
		'email' => $faker->email,
		'title' => $faker->sentence,
		'comment' => $faker->paragraph,
		'rating' => $faker->numberBetween(1,5)
	];
});

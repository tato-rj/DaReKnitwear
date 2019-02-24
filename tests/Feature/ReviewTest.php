<?php

namespace Tests\Feature;

use Tests\AppTest;
use App\Review;

class ReviewTest extends AppTest
{
	/** @test */
	public function a_visitor_can_write_a_review_on_the_product_page()
	{
		$review = make('App\Review');

		$this->post(route('products.reviews.store'), $review->toArray())
			 ->assertSessionHas('status');

		$this->assertDatabaseHas('reviews', ['email' => $review->email]);
	}

	/** @test */
	public function the_same_visitor_cannot_write_more_than_one_review_per_minute()
	{
		$review = make('App\Review');
		
		$this->post(route('products.reviews.store'), $review->toArray());

		$this->expectException('Illuminate\Http\Exceptions\ThrottleRequestsException');

		$this->post(route('products.reviews.store'), $review->toArray());
	}
}

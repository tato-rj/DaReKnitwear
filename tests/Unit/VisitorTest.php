<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\{Visitor, Cart, Inventory};

class VisitorTest extends AppTest
{
	/** @test */
	public function it_has_a_profile()
	{
		$this->assertInstanceOf('App\Visitor', $this->visitor);
	}

	/** @test */
	public function it_has_a_cart()
	{
		Cart::add($this->visitor, Inventory::first());

		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->visitor->cart);

		$this->assertInstanceOf('App\Inventory', $this->visitor->cart->first());
	}

	/** @test */
	public function it_knows_when_was_the_last_login()
	{
		$this->assertInstanceOf('Carbon\Carbon', $this->visitor->last_login_at);
	}

	/** @test */
	public function it_knows_which_profiles_are_no_longer_being_used()
	{
		$this->assertCount(0, Visitor::irrelevant()->get());

		$this->visitor->update(['last_login_at' => now()->subMonths(4)]);

		$this->assertCount(1, Visitor::irrelevant()->get());
	}

	/** @test */
	public function it_can_delete_any_visitor_profile_that_has_been_unused_for_a_long_period_of_time()
	{
		$this->visitor->update(['last_login_at' => now()->subMonths(4)]);

		$this->assertCount(1, Visitor::irrelevant()->get());

		Visitor::irrelevant()->delete();

		$this->assertCount(0, Visitor::irrelevant()->get());
	}

	/** @test */
	public function its_cart_is_removed_when_the_visitor_is_deleted()
	{
		create('App\Cart', [
			'customer_id' => $this->visitor->id,
			'customer_type' => get_class($this->visitor)]);
		
		$cartsCount = Cart::count();

		$this->visitor->delete();

		$this->assertNotEquals($cartsCount, Cart::count());
	}
}

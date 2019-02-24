<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\{Cart, Inventory};

class CartTest extends AppTest
{
	/** @test */
	public function it_may_belong_to_a_user()
	{
		$this->assertInstanceOf('App\User', $this->cart->customer);
	}

	/** @test */
	public function it_may_belong_to_a_visitor()
	{
		Cart::add($this->visitor, Inventory::first());
		
		$visitorCart = Cart::from($this->visitor)->first();

		$this->assertInstanceOf('App\Visitor', $visitorCart->customer);
	}

	/** @test */
	public function it_has_many_items()
	{
		$this->assertCount(1, $this->user->cart);

		$this->assertInstanceOf('App\Sweater', $this->user->cart->first()->product);
	}

	/** @test */
	public function it_can_add_items()
	{
		$this->assertCount(1, $this->user->cart);

		$newSweater = create('App\Sweater');

		Inventory::add($newSweater, $this->fakeRequest);

		$item = Inventory::for($newSweater)->first();
		
		Cart::add($this->user, $item);

		$this->assertCount(2, $this->user->cart);
	}

	/** @test */
	public function it_can_find_an_item()
	{		 
		$itemNotOnCart = create('App\Inventory');

		$itemOnCart = $this->user->cart->first();

		$this->assertEmpty(Cart::from($this->user)->item($itemNotOnCart));

		$this->assertNotEmpty(Cart::from($this->user)->item($itemOnCart));
	}

	/** @test */
	public function it_can_remove_one_item_at_a_time()
	{
		$item = $this->user->cart->first();

		Cart::add($this->user, $item);

		$this->assertCount(2, $this->user->cart);

		Cart::from($this->user)->remove($item);

		$this->assertCount(1, $this->user->cart);
	}

	/** @test */
	public function it_can_remove_all_copies_of_an_item_at_once()
	{
		$item = $this->user->cart->first();

		Cart::add($this->user, $item);

		$this->assertCount(2, $this->user->cart);

		Cart::from($this->user)->removeAll($item);

		$this->assertCount(0, $this->user->cart);
	}

	/** @test */
	public function it_can_empty_an_entire_cart()
	{
		$this->assertCount(1, $this->user->cart);

		Cart::from($this->user)->delete();

		$this->assertCount(0, $this->user->cart);
	}

	/** @test */
	public function it_can_locate_a_specific_users_cart()
	{
		$this->assertInstanceOf('App\Cart', Cart::byUser($this->user));
	}
}

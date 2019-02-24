<?php

namespace Tests\Feature;

use Tests\AppTest;
use App\{Inventory, Cart};

class PurchaseTest extends AppTest
{
	/** @test */
	public function inventory_items_are_marked_as_sold_after_a_checkout()
	{
		Inventory::add($this->sweater, $this->fakeRequest, 2);

		Cart::add($this->visitor, $this->sweater->inventory[0]);
		
		Cart::add($this->visitor, $this->sweater->inventory[1]);

		$this->assertEquals(0, $this->sweater->sold($this->fakeRequest->color)->count());

		$this->post(route('cart.checkout.purchase', [
			'cart_id' => $this->visitor->visitor_id,
		]));

		$this->assertEquals(2, $this->sweater->sold($this->fakeRequest->color)->count());
	}
}
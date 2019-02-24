<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\{Inventory, Cart};

class UserTest extends AppTest
{
	/** @test */
	public function it_has_a_cart()
	{
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->cart);

		$this->assertInstanceOf('App\Inventory', $this->user->cart->first());
	}
}

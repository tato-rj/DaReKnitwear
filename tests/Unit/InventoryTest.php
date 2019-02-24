<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\Inventory;

class InventoryTest extends AppTest
{
	/** @test */
	public function it_knows_its_product()
	{
		Inventory::add($this->sweater, $this->fakeRequest);

		$this->assertInstanceOf('App\Sweater', Inventory::first()->product);
	}

	/** @test */
	public function it_can_find_items_by_product()
	{
		Inventory::add($this->sweater, $this->fakeRequest);

		$this->assertInstanceOf('App\Sweater', Inventory::for($this->sweater)->first()->product);		 
	}

	/** @test */
	public function it_finds_a_product_by_size_and_color()
	{
		Inventory::add($this->sweater, $this->fakeRequest);
		
		$this->assertInstanceOf('App\Inventory', Inventory::fetch(get_class($this->sweater), $this->sweater->id, $this->fakeRequest->color, $this->fakeRequest->size));
	}

	/** @test */
	public function it_can_add_items()
	{
		Inventory::add($this->sweater, $this->fakeRequest);

		$this->assertEquals(1, Inventory::for($this->sweater)->count());
	}

	/** @test */
	public function it_can_add_many_items_at_once()
	{
		Inventory::add($this->sweater, $this->fakeRequest, 2);

		$this->assertEquals(2, Inventory::for($this->sweater)->count());
	}

	/** @test */
	public function it_can_ship_items()
	{
		Inventory::add($this->sweater, $this->fakeRequest);

		$item = Inventory::first();

		$item->ship();

		$this->assertNotNull($item->shipped_at);
	}

	/** @test */
	public function it_can_return_items()
	{
		Inventory::add($this->sweater, $this->fakeRequest);

		$item = Inventory::first();

		$item->ship();

		$this->assertNotNull($item->shipped_at);
		
		$item->return();

		$this->assertNull($item->shipped_at);	 
	}
}

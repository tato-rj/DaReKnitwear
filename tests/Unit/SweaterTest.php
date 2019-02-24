<?php

namespace Tests\Unit;

use Tests\AppTest;
use App\{Inventory, Image};

class SweaterTest extends AppTest
{
	/** @test */
	public function it_has_a_supplier()
	{
		$this->assertInstanceOf('App\Supplier', $this->sweater->supplier);
	}

	/** @test */
	public function it_has_many_reviews()
	{
		$this->assertInstanceOf('App\Review', $this->sweater->reviews->first());		
	}

	/** @test */
	public function it_knows_its_average_rating()
	{
		$newReview = create('App\Review', ['reviewable_id' => $this->sweater->id, 'reviewable_type' => get_class($this->sweater), 'rating' => 2]);

		$this->assertEquals(4, $this->sweater->rating);
	}

	/** @test */
	public function it_has_many_images()
	{
		Image::create(['product_id' => $this->sweater->id, 'product_type' => get_class($this->sweater), 'color' => 'white', 'path' => 'image.jpg']);

		$this->assertNotNull($this->sweater->images());
	}

	/** @test */
	public function it_knows_how_to_add_images()
	{
		$this->assertCount(0, Image::all());

		$this->sweater->addImage('white', 'image.jpg');

		$this->assertCount(1, Image::all());
	}

	/** @test */
	public function it_has_many_items_in_the_inventory()
	{		
		Inventory::add($this->sweater, $this->fakeRequest);

		$this->assertInstanceOf('App\Inventory', $this->sweater->fresh()->inventory->first());
	}

	/** @test */
	public function it_knows_its_inventory_count()
	{
		Inventory::add($this->sweater, $this->fakeRequest, 2);

		$this->assertEquals(2, $this->sweater->fresh()->inventory->count());
	}

	/** @test */
	public function it_knows_its_available_colors()
	{
		Inventory::add($this->sweater, $this->fakeRequest, 1);

		$this->assertCount(1, $this->sweater->colors());
	}

	/** @test */
	public function it_knows_its_available_sizes_on_a_given_color()
	{
		Inventory::add($this->sweater, $this->fakeRequest, 1);

		$this->assertCount(0, $this->sweater->sizes('xx'));

		$this->assertCount(1, $this->sweater->sizes($this->fakeRequest->color));
	}

	/** @test */
	public function it_knows_the_number_of_items_by_a_specific_size()
	{
		Inventory::add($this->sweater, $this->fakeRequest, 1);

		$this->assertNull($this->sweater->itemsLeft($this->fakeRequest->color, 'xx'));

		$this->assertNotNull($this->sweater->itemsLeft($this->fakeRequest->color, 'm'));		 
	}

	/** @test */
	public function it_knows_its_sold_and_unsold_items()
	{
		Inventory::add($this->sweater, $this->fakeRequest);
		 
		$this->assertEquals(1, $this->sweater->unsold($this->fakeRequest->color)->count());
		
		$this->assertEquals(0, $this->sweater->sold($this->fakeRequest->color)->count());
	}

	/** @test */
	public function it_knows_its_shipped_and_unshipped_items()
	{
		$this->assertEquals(0, $this->sweater->shipped->count());

		Inventory::add($this->sweater, $this->fakeRequest, 2);

		Inventory::for($this->sweater)->first()->ship();

		$this->assertEquals(1, $this->sweater->shipped->count());

		$this->assertEquals(1, $this->sweater->unshipped->count());
	}

	/** @test */
	public function its_images_are_deleted_when_the_sweater_is_deleted()
	{
		Image::create(['product_id' => $this->sweater->id, 'product_type' => get_class($this->sweater), 'color' => 'white', 'path' => 'image.jpg']);
		
		$this->assertCount(1, Image::all());

		$this->sweater->delete();

		$this->assertCount(0, Image::all());
	}
}

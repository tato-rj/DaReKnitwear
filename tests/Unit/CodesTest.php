<?php

namespace Tests\Unit;

use Tests\AppTest;

class CodesTest extends AppTest
{
	/** @test */
	public function it_generates_the_sku()
	{
		$sku = codes()->sku($this->sweater, 'white', 'm');

		$this->assertNotNull($sku);
	}

	/** @test */
	public function it_generates_the_item_id()
	{
		$itemId = codes()->itemId(1);

		$this->assertNotNull($itemId);
	}

	/** @test */
	public function it_generates_a_random_id_for_visitors()
	{
		$visitorId = codes()->visitorId();

		$this->assertEquals(32, strlen($visitorId));
	}
}

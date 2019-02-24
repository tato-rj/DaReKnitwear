<?php

namespace Tests\Unit;

use Tests\AppTest;

class ReviewTest extends AppTest
{
	/** @test */
	public function it_belongs_to_a_product()
	{
		$this->assertInstanceOf('App\Sweater', $this->review->product);
	}
}

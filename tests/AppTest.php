<?php

namespace Tests;

use Tests\Utilities\ExceptionHandling;
use Illuminate\Foundation\Testing\DatabaseMigrations;

abstract class AppTest extends TestCase
{
	use DatabaseMigrations, ExceptionHandling;

	protected $fakeRequest, $sweater, $user, $visitor, $cart;

    public function setUp()
    {
        parent::setUp();

        $this->disableExceptionHandling();
        
        $this->visitor = create('App\Visitor');

        $this->user = create('App\User');

        $this->cart = create('App\Cart', ['customer_id' => $this->user->id]);

        $this->sweater = create('App\Sweater');

        $this->review = create('App\Review', ['reviewable_id' => $this->sweater->id, 'reviewable_type' => get_class($this->sweater), 'rating' => 5]);

        $this->fakeRequest = fakeRequest([
			'size' => 'm',
			'color' => 'blue'
		]);
    }
}

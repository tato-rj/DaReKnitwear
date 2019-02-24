<?php

namespace App\Support;

use App\Visitor;

class Checkout
{
	public function getCart()
	{
        $customer = getCustomer();

        $cart = $customer->cart;

        $response['cart'] = $cart->groupBy('sku');

        $response['totalPrice'] = $cart->sum('product.price');

        if ($response['cart']->isEmpty())
            abort(404, 'No cart found.');

        return $response;
	}
}

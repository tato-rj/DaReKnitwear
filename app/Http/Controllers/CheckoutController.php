<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Checkout;
use App\{Inventory, Visitor, Cart};

class CheckoutController extends Controller
{
    public function customer()
    {
        $checkout = (new Checkout)->getCart();
        
        $cart = $checkout['cart'];
        
        $totalPrice = $checkout['totalPrice'];

    	return view('pages.cart.checkout.step1', compact(['cart', 'totalPrice']));
    }

    public function shipping()
    {
        $checkout = (new Checkout)->getCart();
        
        $cart = $checkout['cart'];
        
        $totalPrice = $checkout['totalPrice'];

        return view('pages.cart.checkout.step2', compact(['cart', 'totalPrice']));
    }

    public function payment()
    {
        $checkout = (new Checkout)->getCart();

        $cart = $checkout['cart'];
        
        $totalPrice = $checkout['totalPrice'];

        return view('pages.cart.checkout.step3', compact(['cart', 'totalPrice']));
    }

    public function purchase(Request $request)
    {
        $cart = (new Checkout)->getCart()['cart'];

        $customer = getCustomer();

        $customer->checkout();

        Cart::from($customer)->empty();

        return view('pages.cart.checkout.complete', compact(['cart']));
    }
}

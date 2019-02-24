<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Checkout;
use App\{Inventory, Cart, Visitor};

class CartController extends Controller
{
    public function index()
    {
        $checkout = (new Checkout)->getCart();
        
        $cart = $checkout['cart'];
        
        $totalPrice = $checkout['totalPrice'];

        return view('pages.cart.index', compact(['cart', 'totalPrice']));
    }

    public function add(Request $request)
    {
    	$response = [];

        $customer = getCustomer($catchError = false);

        $cartIds = $customer->exists() ? $customer->cartIds : [];

    	$item = Inventory::except($cartIds)->fetch($request->product_type, $request->product_id, $request->color, $request->size);

        abortIf(! $item->exists(), 413, 'Sorry, we\'re out of stock');

        if ($customer->exists())
            Cart::add($customer, $item);
		
        $response['html'] = view('components.cart.item.small', ['item' => $item])->render();

		$response['json'] = $item;

		return $response;
    }

    public function delete(Request $request)
    {
        $customer = getCustomer();

        $item = Inventory::fetch($request->product_type, $request->product_id, $request->color, $request->size);
        
        Cart::from($customer)->remove($item);

        return response(200);
    }

    public function deleteAll(Request $request)
    {
        $customer = getCustomer();

        $item = Inventory::fetch($request->product_type, $request->product_id, $request->color, $request->size);
        
        Cart::from($customer)->removeAll($item);

        return response(200);
    }

    public function show()
    {
        $customer = getCustomer();

        $customer->recordVisit();

        $response = [];

        foreach ($customer->cart as $item) {
            $result['html'] = view('components.cart.item.small', ['item' => $item])->render();

            $result['json'] = $item;

            array_push($response, $result);
        }

        return $response;        
    }
}

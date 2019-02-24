<?php

namespace App\Traits;

use App\Cart;

trait HasCart
{
    public function getCartAttribute()
    {
        $cart = Cart::where(['customer_id' => $this->id, 'customer_type' => get_class($this)])->get();

        $items = $cart->map(function ($item, $key) {
            return $item->item;
        });

        return $items;
    }

    public function getCartIdsAttribute()
    {
        $ids = $this->cart->map(function($item, $key) {
            return $item->id;
        });

        return $ids;
    }

    public function checkout()
    {
    	// PURCHASE ITEMS IN CART
    	
        $this->cart->each(function($item, $key) {
            $item->update(['purchased_at' => now()]);
        });
    }
}

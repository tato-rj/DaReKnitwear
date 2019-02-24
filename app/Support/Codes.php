<?php

namespace App\Support;

use App\Contracts\Product;
use App\Inventory;

class Codes
{
    public function sku(Product $product, $color, $size, $country = 'US')
    {
    	$type = substr(get_class($product), 4, 2);
    	$color = substr($color, 0, 2);
    	$year = $product->created_at->format('y');
        $id = $product->id;

    	return strtoupper($country . $type . '-' . $size . $color . $year . $id); 
    }

    public function itemId($iteration)
    {
        $count = Inventory::count();
        return strtoupper(substr(md5(now()->timestamp + $iteration . $count), 0, 12));
    }

    public function visitorId()
    {
        return str_shuffle(md5(now()));
    }
}

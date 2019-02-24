<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\Product;
use Illuminate\Http\Request;

class Inventory extends Model
{
    protected $with = ['product'];
    protected $guarded = [];

    public function product()
    {
        return $this->morphTo();
    }

    public function getLongSizeAttribute()
    {
        return $this->product->sizes[$this->size];
    }

    public function scopeAdd($query, Product $product, Request $request, $count = 1)
    {
    	for ($i=1; $i<=$count; $i++) {
	    	$this->create([
	    		'sku' => codes()->sku($product, $request->color, $request->size),
	    		'item_id' => codes()->itemId($i),
	    		'product_id' => $product->id,
	    		'product_type' => get_class($product),
	    		'size' => $request->size,
	    		'color' => $request->color
	    	]);
    	}
    }

    public function scopeExcept($query, $array)
    {
        return $query->whereNotIn('id', $array);
    }

    public function scopeFetch($query, $product_type, $product_id, $color, $size)
    {
        return $query->whereNull('purchased_at')->where([
            'product_type' => $product_type,
            'product_id' => $product_id,
            'color' => $color,
            'size' => $size,
        ])->first();
    }

    public function scopeShip()
    {
    	return $this->update(['shipped_at' => now()]);
    }

    public function scopeReturn()
    {
        return $this->update(['shipped_at' => null]);
    }

    public function scopeFor($query, Product $product)
    {
        return $query->where([
            'product_id' => $product->id,
            'product_type' => get_class($product)
        ]);
    }

    public function scopeLocate($query, $item_id)
    {
        return $query->where('item_id', $item_id)->first();
    }

    public function scopeDisplay($query, $quantity = null)
    {
        $products = [];

        $inventory = Sweater::has('inventory')->inRandomOrder()->take($quantity)->get();

        foreach ($inventory as $product) {
            if ($quantity) {
                array_push($products, $product->inventory->groupBy('color')->random()->first());
            } else {
                foreach ($product->inventory->groupBy('color') as $color => $items) {
                    array_push($products, $items->first());
                }          
            }
        }
        
        return $products;
    }

    public function images()
    {
        return \DB::table('images')->where('item_id', $this->item_id)->pluck('path');
    }
}

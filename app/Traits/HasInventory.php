<?php

namespace App\Traits;

use App\{Inventory, Supplier};

trait HasInventory
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);    
    }

    public function inventory()
    {
    	return $this->morphMany(Inventory::class, 'product');
    }

    public function unsold($color = null)
    {
        $inventory = $this->inventory();

        if ($color)
            $inventory->where('color', $color);

        return $inventory->whereNull('purchased_at')->get();
    }

    public function sold($color = null)
    {
        return $this->inventory()->where('color', $color)->whereNotNull('purchased_at')->get();
    }

    public function getUnshippedAttribute()
    {
        return $this->inventory()->whereNull('shipped_at')->get();
    }

    public function getShippedAttribute()
    {
        return $this->inventory()->whereNotNull('shipped_at')->get();
    }
}

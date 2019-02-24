<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\Customer;

class Cart extends Model
{
	protected $guarded = [];
	protected $with = ['item'];

	public function customer()
	{
		return $this->morphTo();
	}

	public function item()
	{
		return $this->belongsTo(Inventory::class, 'item_id');
	}

	public function scopeByUser($query, Customer $customer)
	{
		return $query->where(['customer_id' => $customer->id, 'customer_type' => get_class($customer)])->first();
	}

	public function scopeAdd($query, Customer $customer, Inventory $item)
	{
    	$this->create([
    		'customer_id' => $customer->id,
    		'customer_type' => get_class($customer),
    		'item_id' => $item->id
    	]);
	}

	public function scopeFrom($query, Customer $customer)
	{
		return $query->where([
			'customer_id' => $customer->id, 
			'customer_type' => get_class($customer)
		]);
	}

	public function scopeItem($query, Inventory $item)
	{
		return $query->where('item_id', $item->id)->get();
	}

	public function scopeRemove($query, Inventory $item)
	{
		return $query->whereHas('item', function($q) use ($item) {
			$q->where('sku', $item->sku);
		})->first()->delete();
	}

	public function scopeRemoveAll($query, Inventory $item)
	{
		return $query->whereHas('item', function($q) use ($item) {
			$q->where('sku', $item->sku);
		})->delete();
	}

	public function scopeEmpty($query)
	{
		return $query->delete();
	}
}

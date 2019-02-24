<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\Customer;
use App\Traits\HasCart;

class Visitor extends Model implements Customer
{
	use HasCart;
	
    protected $guarded = [];

    protected $dates = ['last_login_at'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($visitor) {
            Cart::byUser($visitor)->delete();
        });
    }

    public function scopeIrrelevant($query)
    {
    	return $query->whereDate('last_login_at', '<', now()->copy()->subMonths(3));
    }

    public function scopeLocate($query, $id)
    {
        return $query->where('visitor_id', $id)->first();
    }

    public function recordVisit()
    {
        return $this->update(['last_login_at' => now()]);
    }
}

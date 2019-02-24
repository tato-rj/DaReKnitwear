<?php

namespace App\Traits;

trait Reviewable
{
    public function reviews()
    {
        return $this->morphMany('App\Review', 'reviewable')->latest();
    }

    public function getRatingAttribute()
    {
    	return ceil($this->reviews->average('rating'));
    }
}

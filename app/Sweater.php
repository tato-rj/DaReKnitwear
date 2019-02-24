<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\Product;
use App\Traits\{HasInventory, FindBySlug, Reviewable};

class Sweater extends Model implements Product
{
    use HasInventory, FindBySlug, Reviewable;

    protected $guarded = [];
    protected $sizes = ['s' => 'small', 'm' => 'medium', 'l' => 'large'];
    protected $withCount = ['reviews'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($product) {
            Image::where(['product_id' => $product->id, 'product_type' => get_class($product)])->delete();
        });
    }

    public function getSizesAttribute()
    {
        return $this->sizes;
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function price($currency, $quantity = 1)
    {
        return '$' . $this->price * $quantity / 100;
    }

    public function colors()
    {
        $colors = $this->inventory->pluck('color')->toArray();

        return array_count_values($colors);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'product');
    }

    public function imagesByColor($color)
    {
        return $this->images()->where('color', str_slug($color))->get()->toArray();
    }

    public function mainImage($color)
    {
        $images = $this->imagesByColor($color);

        if (count($images) == 0)
            return 'No image.';

        return $images[0]['path'];
    }

    public function sizes($color)
    {
        $sizes = $this->inventory()->whereNull('purchased_at')->get()->where('color', str_slug($color))->pluck('size')->toArray();

        return array_count_values($sizes);
    }

    public function itemsLeft($color, $size)
    {
        $sizes = $this->sizes($color);

        if (array_key_exists($size, $sizes))
            return $sizes[$size];

        return null;
    }

    public function addImage($color, $image)
    {
		return Image::create([
			'product_id' => $this->id,
            'product_type' => get_class($this),
			'color' => $color,
			'path' => $image]);
    }

    public function getNoteAttribute()
    {
        return 'ALMOST GONE';
    }
}

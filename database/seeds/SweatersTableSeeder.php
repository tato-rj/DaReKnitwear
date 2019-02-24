<?php

use Illuminate\Database\Seeder;
use App\{Sweater, Inventory, Image};


class SweatersTableSeeder extends Seeder
{
    public function run()
    {
        $this->newSweater(
            'Collo Alto Jubilee',
            'Highneck sweater in baby cashmere yarn, crafted with cables and fisherman\'s rib. A warm, super-soft knit, styled with drop shoulders and flared cuffs.',
            '41500',
            [
                'white-snow' => 4,
                'light-rose' => 2
            ]
        );

        $this->newSweater(
            'Dolcevita Kimberley',
            'Turtleneck sweater in baby cashmere, crafted in purl stitch with a subtle cable pattern on the centre and sides. Light weight and softly cut, this is a refined, comfortable layer to slip on under a jacket, a soft caress against the skin.',
            '49500',
            [
                'white-snow' => 3,
                'golden-melange' => 2
            ]
        );

        $this->newSweater(
            'Dolcevita Porter',
            'Turtleneck crafted from a combination of cashmere and cashmere Coarsehair® in different colours, with stand-out jacquard-knit stripes. Below hip length with a soft cut.',
            '39500',
            [
                'navy' => 3,
                'bordeaux' => 3
            ]
        );

        $this->newSweater(
            'Dolcevita Intarsio',
            'High-neck sweater in baby cashmere crafted in cable-knit with inlay detailing. An exquisite, enveloping knit that is perfect for cold winter days in the mountains.',
            '46000',
            [
                'white-snow' => 3,
            ]
        );

        $this->newSweater(
            'Bomber Bakewell',
            'Cashmere bomber with zip crafted in corncob stitch, inlaid with contrasting details. Below hip length with a wide cut, perfect teamed with the Bakewell sweater to create a refined casual ensemble.',
            '51500',
            [
                'white-pearl' => 2,
            ]
        );

        $this->newSweater(
            'Bomber Merano',
            'Casual bomber in baby cashmere styled with a relaxed cut. A light-weight piece that is perfect teamed with the Merano trouser to create a refined tracksuit for leisure time.',
            '32500',
            [
                'white' => 3,
                'golden-melange' => 2,
                'navy' => 2,
            ]
        );

        $this->newSweater(
            'Over Parksville',
            'Roundneck sweater in baby cashmere with an exquisitely soft, downy consistency. Crafted in plain knit, this is a comfortable, refined wardrobe staple, perfect under a jacket.',
            '32500',
            [
                'white-snow' => 3,
                'navy' => 3,
            ]
        );

        $this->newSweater(
            'Snowy Boy',
            'Roundneck sweater in baby cashmere, worked in plain knit with rib-knit trim. Light weight and exquisitely soft, it features an inlaid pattern of snowmen and snowflakes. Ideal for leisure time in the mountains.',
            '35000',
            [
                'winter-grey' => 3
            ]
        );

        $this->newSweater(
            'Girocollo Mount Snow',
            'Roundneck plain knit cashmere sweater embellished with embroidered snowflakes and applications. A medium-weight knit, hip length with a relaxed cut. Perfect for winter days in the mountains.',
            '45000',
            [
                'white-snow' => 3,
                'sirio-melange' => 3
            ]
        );
    }

    public function newSweater($name, $description, $price, $colors = [])
    {
        $sweater = Sweater::create([
            'slug' => str_slug($name),
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'supplier_id' => '1'
        ]);

        foreach ($colors as $color => $imagesCount) {
            for($i=1; $i <= $imagesCount; $i++) {
                Image::create([
                    'product_id' => $sweater->id,
                    'product_type' => get_class($sweater), 
                    'color' => $color, 
                    'path' => 'storage/' . str_slug($sweater->name) . '/' . $color . $i .'.jpg']);
            }

            if ($this->lucky()) {
                Inventory::add(
                    $sweater, 
                    $this->attributes(['size' => 's', 'color' => $color]),
                    $quantity = mt_rand(1,12)
                );
            }

            if ($this->lucky()) {
                Inventory::add(
                    $sweater, 
                    $this->attributes(['size' => 'm', 'color' => $color]),
                    $quantity = mt_rand(1,12)
                );
            }

            if ($this->lucky()) {
                Inventory::add(
                    $sweater, 
                    $this->attributes(['size' => 'l', 'color' => $color]),
                    $quantity = mt_rand(1,12)
                );
            }

            if ($this->lucky(7)) {
                $count = mt_rand(1,6);

                for ($i=0; $i<$count; $i++) {
                    $sweater->reviews()->create(factory('App\Review')->make());
                }
            }
        }
    }

    public function lucky($chance = 5)
    {
        return mt_rand(2,10) >= $chance;
    }

    public function attributes($attributes)
    {
		$request = new \Illuminate\Http\Request();

		return $request->replace($attributes);
    }
}
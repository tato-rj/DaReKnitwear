<div id="overview-sale" style="display: none;" class="row">

    @include('components.product.card', [
       'wishlist' => true,
        'image' => '02',
        'name' => 'The Luxe Unisex Merino Sweater',
        'price' => 100,
        'discount' => 80,
        'color' => [
            'label' => 'Camel',
            'name' => 'orange',
            'size' => 10
            ]
        ])

    @include('components.product.card', [
        'wishlist' => true,
        'image' => '03',
        'name' => 'Essential Merino V-neck',
        'price' => 75,
        'discount' => 50,
        'color' => [
            'label' => 'Sweater Olive',
            'name' => 'purple',
            'size' => 10
            ]
        ])

    @include('components.product.card', [
        'wishlist' => true,
        'image' => '04',
        'name' => 'Argot Fair Isle Wool Cashmere Crew Pullover',
        'price' => 105,
        'discount' => 80,
        'color' => [
            'label' => 'Midnight Blue',
            'name' => 'indigo',
            'size' => 10
            ]
        ])

    @include('components.product.card', [
        'wishlist' => true,
        'image' => '02',
        'name' => 'The Luxe Unisex Merino Sweater',
        'price' => 100,
        'discount' => 75,
        'color' => [
            'label' => 'Camel',
            'name' => 'orange',
            'size' => 10
            ]
        ])

</div>
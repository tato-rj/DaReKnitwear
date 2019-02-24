@include('layouts.header.dropdowns.layout', [
	'sections' => [
		[
		'label' => 'FEATURED',
		'items' => [
				['url' => '#', 'label' => 'New arrivals'],
				['url' => '#', 'label' => '100% merino'],
				['url' => '#', 'label' => 'Under $75'],
				['url' => '#', 'label' => 'Best sellers'],
			]
		],
		[
		'label' => 'WOMEN',
		'items' => [
				['url' => '#', 'label' => 'Sweaters & cardigans'],
				['url' => '#', 'label' => 'Sweatshirt & scarves'],
				['url' => '#', 'label' => 'Tops & tees']
			]
		],
		[
		'label' => 'MEN',
		'items' => [
				['url' => '#', 'label' => 'Sweaters'],
				['url' => '#', 'label' => 'Polos & tees']
			]
		],
	],
	'images' => ['mongolian-women', 'silk-women']
])

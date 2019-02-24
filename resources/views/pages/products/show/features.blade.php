<div class="col-12 mb-6">
	<h2 class="serif m-0 text-center">Unique features</h2>
</div>
<div class="col-12"> 
@include('pages.products.show.sections.feature', [
	'image' => [
		'path' => 'images/misc/feature1.jpg', 
		'order' => 0
	],
	'description' => [
		'text' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		'order' => 1
		]
])

@include('pages.products.show.sections.feature', [
	'image' => [
		'path' => 'images/misc/feature2.jpg', 
		'order' => 1
	],
	'description' => [
		'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
		'order' => 0
		]
])
</div>
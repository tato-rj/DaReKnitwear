<section class="container mb-8">
	<div class="row mb-4">
        <div class="col-12 mb-5 text-center">
    		@include('components.page-title', ['title' => 'Our Blog'])
        </div>

        @include('components.post', [
            'image' => 1, 
            'title' => '8 Inspiring Ways to Wear Dresses in the Winter', 
            'preview' => 'Duis ut velit gravida nibh bibendum commodo. Suspendisse pellentesque mattis augue id euismod. Interdum et male-suada fames'])

        @include('components.post', [
            'image' => 2, 
            'title' => 'The Great Big List of Men’s Gifts for the Holidays', 
            'preview' => 'Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame'])

        @include('components.post', [
            'image' => 3, 
            'title' => '5 Winter-to-Spring Fashion Trends to Try Now', 
            'preview' => 'Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed hendrerit ligula porttitor. Fusce sit amet maximus nunc'])
	</div>
    <div class="text-center">
        <a href="#" class="btn btn-wide btn-outline-dark">VIEW ALL POSTS</a>
    </div>
</section>
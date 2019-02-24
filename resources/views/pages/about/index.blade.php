@extends('layouts.app')

@section('content')

<div class="container no-lead">

	@include('components.breadcrumbs', ['pages' => [
		['name' => 'Home', 'url' => route('home')],
		['name' => 'About']
	]])

	@include('components.page-title', [
	'title' => 'About us',
	'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
	'divider' => false])

</div>

<div class="container mb-5">
	<div class="row">
		<div class="col-8 mx-auto text-justify">
			<div class="mb-5">
				<img src="{{asset('images/brand/veneto.jpg')}}" class="w-100">
			</div>
			<p class="text-primary"><strong>OUR HISTORY</strong></p>
			<p>Mr. Avellino Da Re was a man with a humble background. He lived in the countryside, a few dozen kilometers from Venice, Italy. As a survivor of the Second World War, he was working in the markets, backbreaking work in early 1940. His wife, Libera, sixth of twelve siblings, was left under her aunt’s care in Vittorio Veneto, given the few resources that her family had. Her aunt owned a small knitwear factory and taught her the knitter job which Libera learned extremely well and quickly. Moreover, she offered her one of first knitwear machinery, a valuable gift at that time, which we proudly still conserve with care.</p>

			<p>When Avellino and Libera got married she knitted socks and jumpers, which were easily sold by Avellino after work. Given the ease in selling Libera’s creations Avellino decided to quit his job and found a knitwear factory, making Libera’s dream come true. It started as a garage project, as the factory was located in Avellino’s father’s stall. Day after day, year after year, the tiny startup became an outstanding company, which gave work to over 100 employees. Libera, Avellino and their sons had worked together with big names of the Italian fashion such as Gianfranco Ferre’, Roberto Cavalli, Moschino and Krizia. The company was a value not only for the Da Re family and its employees but also for the whole venetian countryside which built its identity fulfilled by hard work, beautiful simplicity and great attention to quality. The way to make this possible was through knowledge passed down from generation to generation.</p>

			<p>Regrettably, during the last thirty years, the Italian economy hasn’t been the most stable and fruitful. This has led to the disappearing of many medium-small companies suffocated by the cut-through competition and the high tax burden. In 1997 Da Re Knitwear Factory closed its business together with its long-standing excellence, knowledge and passion.</p>

			<p>We brought back to life Da Re’s Knitwear Factory to make Venetian craftsmen bright again as an excellence of expertise, quality and values. We want to boost, promote and sustain the real made in Italy by skilled Italians craftsmen whose work knowledge comes from their past generations.</p>
		</div>
	</div>
</div>

<div class="mb-6">
@include('components.bars.origin')
</div>

<div class="container mb-5">
	<div class="row">
		<div class="col-8 mx-auto text-justify">
			<p class="text-primary"><strong>CASHMERE KNITWEAR INDUSTRY</strong></p>
			<p>We produce exclusively 100% high-quality cashmere knitwear as we like the idea of creating garments that could be passed down from generation to generation. We believe in quality, ethical and fair trade fashion made by experienced Italian craftsmen. We believe in care fashion, not in fast fashion. Excellence takes time, time needs and dedication, and dedication needs passion. </p>

			<p>We made the choice to produce exclusively cashmere knitwear to invest our time and care to create long lasting garments in terms of design, fit and wool quality. Cashmere doesn’t mean only extreme softness but also intense warmth, strength, and durability. Indeed cashmere is finer, stronger, lighter, softer and approximately three times more insulating than sheep wool.</p>

			<p>We buy only the best and finest cashmere from across Northern China and Mongolia. Only the cashmere that reaches our standard of excellence is then transformed into superior quality knitwear and garments, produced through a combination of sophisticated technology, a profound knowledge of textiles, and a lifelong commitment to perfection.</p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-6 bg-align-center" style="background-image: url({{asset('images/backgrounds/factory.jpg')}});">
			<div class="overlay opacity-8" style="background: rgba(0,0,0,0.2);"></div>
		</div>
		<div class="col-6 d-flex justify-content-center flex-column px-6 py-5">
			<div class="mb-4">
				<p class="text-primary"><strong>OUR PHYLOSOPHY</strong></p>
				<p>As a fair trade and ethical clothing brand, we believe that the Italian fashion culture should be preserved, endorsed and promoted. We love our region and we want to boost its excellence.</p>
				<p>Choosing to adopt a more sustainable wardrobe makes sense both financially and ethically. If we choose to purchase our clothing with thought and intention, we ultimately will spend less, and save more by producing less waste.</p>
				<p>We deem the knowledge coming from the past should be of benefit for everyone and therefore should not be lost. Thus, we innovate using our traditional knitting knowledge as a cornerstone of our quality made products.</p>
			</div>
			<div>
				<p class="text-primary"><strong>THE ITALIAN DIFFERENCE</strong></p>
				<p>All of our premium cashmere knitwear is made in Italy. The country’s long history of expert craftsmen means our products look better and last longer. While production in Italy is more expensive we believe the difference is well worth it.</p>
			</div>
		</div>
	</div>
</div>

@include('pages.welcome.sections.testimonials')

@endsection

@push('js')

@endpush
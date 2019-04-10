@extends('layouts.app')

@section('content')
@include('pages.welcome.lead.layout')

<div class="mb-8">
{{-- @include('components.bars.sustainability') --}}
</div>

@include('pages.welcome.sections.overview.layout')

@include('components.bars.banners')

@include('pages.welcome.sections.testimonials')

{{-- @include('pages.welcome.sections.gift') --}}

@include('pages.welcome.sections.blog')

@endsection

@push('js')

@endpush
@extends('frontend.master')
@section('page_title', $blog->title)
@section('meta_data')
    <meta name="title" content="{{ $blog?->meta_title }}" />
    <meta name="description" content="{{ $blog?->meta_description }}" />
    <meta name="keywords" content="{{ $blog?->meta_keywords }}" />
@endsection
@section('main')
    <section class="py-12 md:py-20 lg:py-24">
        <div class="container relative space-y-3">
            <a href="{{ route('blogs') }}" class="flex items-center gap-2 text-lg">
                {!! config('icon.chevronLeft') !!}
                Back
            </a>

            <p class="mt-8">{{ $blog?->category?->name }}</p>

            <h1 class="text-2xl md:text-3xl lg:text-4xl font-medium text-dark">{{ $blog->title }}</h1>

            <p> {{ date('d M Y', strtotime($blog->created_at)) }}</p>

            <hr class="border-t border-gray-200 my-8">

            <img  loading="lazy" src="{{ asset($blog->image) }}" class="w-full" alt="{{ $blog->title }}">

            <div class="blog-content">
                {!! $blog->post_content !!}
            </div>
        </div>
    </section>
@endsection

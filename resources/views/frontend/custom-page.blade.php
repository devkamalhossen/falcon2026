@extends('frontend.master')
@section('page_title', $data?->name)
@section('meta_data')
    <meta name="title" content="{{ $data?->meta_title }}" />
    <meta name="description" content="{{ $data?->meta_description }}" />
@endsection
@section('main')
    <section class="overflow-hidden ">
        <div class="container relative z-[1]">
            <div class="relative text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-black font-medium uppercase">
                    {{ $data?->name }}
                </h1>
                <h1
                    class="!z-[3] text-transparent [-webkit-text-stroke:1px_white] left-0 top-0 right-0 absolute text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase">
                    {{ $data?->name }}
                </h1>
            </div>
            @if ($data?->image)
                <div
                    class="h-[250px] sm:h-[350px] md:h-[450px] lg:h-[600px] xl:h-[800px] relative z-[2] -translate-y-5 md:-translate-y-7 lg:-translate-y-10 xl:-translate-y-14 -mb-14">
                    <img loading="lazy" src="{{ asset($data?->image) }}" alt="{{ $data?->name }}"
                        class="w-full h-full object-cover absolute inset-0">

                </div>
            @endif
        </div>
    </section>

    <section class="py-12 md:py-20 lg:py-24">
        <div class="container">
            <div class="blog-content">
                {!! $data->description !!}
            </div>
        </div>
    </section>
@endsection

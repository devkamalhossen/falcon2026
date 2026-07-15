@extends('frontend.master')
@section('page_title', 'Our Products')
@section('meta_data')
    <meta name="title" content="Our Product - Falcon Solution Limited" />
    <meta name="description" content="Browse premium construction chemicals, industrial flooring materials, epoxy coatings, waterproofing solutions, and surface protection products offered by Falcon Solution Limited for residential, commercial, and industrial projects."
 />
@endsection
@section('main')
    <section class="py-12 md:py-20 lg:py-24">
        <div class="container relative space-y-20">
            <h1 class="mb-0 text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-dark font-medium uppercase animate__animated animate__fadeInUp">
                Product List
            </h1>
            <h2 class="text-xl font-normal">Browse premium construction chemicals, industrial flooring materials, epoxy coatings, waterproofing solutions, and surface protection products offered by Falcon Solution Limited for residential, commercial, and industrial projects.</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-12 lg:gap-14">
                @foreach ($data as $category)
                    <div
                        class="group p-8 relative z-[1] overflow-hidden after:absolute after:inset-0 after:bg-black/60 after:size-full after:z-[-1] after:duration-300 hover:after:bg-black/70" data-aos="fade-up">
                        <img  loading="lazy" src="{{ asset($category->image) }}" alt="Falcon Solution Limited"
                            class="absolute size-full object-cover inset-0 z-[-2] duration-300 group-hover:scale-105">
                        <div class="pb-2 border-b border-b-white/10">
                            <h3 class="text-2xl font-semibold text-primary">{{ $category->name }}</h3>
                        </div>
                        <ul class="flex-col flex gap-1.5 text-white pt-3">
                            @foreach ($category?->products as $product)
                                <a target="{{$product->datasheet ? '_blank' : ''}}" href="{{$product->datasheet ? asset($product->datasheet) : 'javascript:void(0)'}}" class="flex items-center gap-2 hover:text-primary" data-aos="fade-up">
                                    {!! config('icon.chevronRight') !!}
                                    {{ $product->name }}
                                </a>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

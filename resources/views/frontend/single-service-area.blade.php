@extends('frontend.master')
@section('page_title', $data?->area_name)
@section('meta_data')
    <meta name="title" content="{{ $data?->meta_title }}" />
    <meta name="description" content="{{ $data?->meta_description }}" />
    <meta name="keywords" content="{{ $data?->meta_keywords }}" />
@endsection
@section('main')
    <!-- Team Banner Section -->
 
     <section class="overflow-hidden ">
        <div class=" relative z-[-1]">
            <div class="relative text-center">
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-black font-medium uppercase animate__animated animate__fadeInUp">
                    {{ $data?->area_name }}
                </h1>
                <h1
                    class="!z-[3] text-transparent [-webkit-text-stroke:1px_white] left-0 top-0 right-0 absolute text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase animate__animated animate__fadeInUp">
                    {{ $data?->area_name }}
                </h1>
            </div>
            <div id="scroll-container"
                class="relative bg-gray-100 overflow-hidden w-[80%] mx-auto -translate-y-5 md:-translate-y-7 lg:-translate-y-10 xl:-translate-y-14 -mb-14 ">
                <div class="h-[250px] sm:h-[350px] md:h-[450px] lg:h-[600px] xl:h-[800px] relative overflow-hidden">
                    @if ($data?->image)
                        <img loading="lazy" src="{{ asset($data?->image) }}" alt="{{ $data?->title }}"
                            id="scroll-zoom-img" class="w-full h-full object-cover absolute inset-0">
                    @else
                        <img loading="lazy" src="{{ asset('frontend/assets/images/contact-img.jpg') }}"
                            alt="{{ $data?->title }}" id="scroll-zoom-img"
                            class="w-full h-full object-cover absolute inset-0">
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Team Cards Section -->
    <section class="py-16 lg:py-24">
        <div class="container" data-aos="fade-up">
            <h3 class="text-2xl md:text-4xl lg:text-3xl font-bold mb-6 uppercase">
                {{ $data?->title }}
            </h3>
            {!! $data?->description !!}
        </div>
    </section>
@endsection

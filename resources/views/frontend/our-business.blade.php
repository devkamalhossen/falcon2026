@extends('frontend.master')
@section('page_title', $data['pageData']?->title)
@section('meta_data')
    <meta name="title" content="{{ $data['pageData']?->meta_title }}" />
    <meta name="description" content="{{ $data['pageData']?->meta_description }}" />
    <meta name="keywords" content="{{ $data['pageData']?->meta_keywords }}" />
@endsection
@section('main')
    <!-- Team Banner Section -->
    <section class="overflow-hidden">
        <div class=" relative z-[-1]">
            <div class="relative text-center">
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-black font-medium uppercase animate__animated animate__fadeInUp">
                    {{ $data['pageData']?->title }}
                </h1>
                <h2
                    class="!z-[3] text-transparent [-webkit-text-stroke:1px_white] left-0 top-0 right-0 absolute text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase animate__animated animate__fadeInUp">
                    {{ $data['pageData']?->title }}
                </h2>
            </div>
            <div id="scroll-container"
                class="relative bg-gray-100 overflow-hidden w-[80%] mx-auto -translate-y-5 md:-translate-y-7 lg:-translate-y-10 xl:-translate-y-14 -mb-14 ">
                <div class="h-[250px] sm:h-[350px] md:h-[450px] lg:h-[600px] xl:h-[800px] relative overflow-hidden">
                    @if ($data['pageData']?->image)
                        <img loading="lazy" src="{{ asset($data['pageData']?->image) }}" alt="{{ $data['pageData']?->title }}"
                            id="scroll-zoom-img" class="w-full h-full object-cover absolute inset-0">
                    @else
                        <img loading="lazy" src="{{ asset('frontend/assets/images/contact-img.jpg') }}"
                            alt="{{ $data['pageData']?->title }}" id="scroll-zoom-img"
                            class="w-full h-full object-cover absolute inset-0">
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Team Cards Section -->
    <section class="py-16 lg:py-24">
        <div class="container">

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-20" data-aos="fade-up">
                @foreach ($data['categories'] as $category)
                    <div class="group relative overflow-hidden">
                        <div class="w-[400px] h-[500px] relative">
                            <img loading="lazy" src="{{ asset($category?->thumbnail) }}" alt="{{ $category?->name }}"
                                class="w-full h-full  object-fit">

                            <div class="py-6 px-5 bg-black/60 absolute inset-x-0 bottom-0">
                                <h3 class="text-lg tracking-wider uppercase font-semibold text-white">
                                    {{ $category?->name }}</h3>
                            </div>
                        </div>
                        <div
                            class="bg-black/60 text-left text-[#fffaf4] flex flex-col gap-3 justify-center items-start text-base absolute inset-0 px-5 py-6 translate-y-full transition-all duration-700 ease-[cubic-bezier(0.72,0.2,0.16,1)] z-[2] group-hover:translate-y-0">
                            <h3 class="text-2xl tracking-wider uppercase font-semibold text-white">{{ $category?->name }}
                            </h3>
                            @foreach ($category?->businesses as $business)
                                <a class="flex items-center gap-1 text-xl hover:text-primary hover:underline"
                                    href="{{ $business->link }}">{{ $business->name }} <span class="text-primary">
                                        {!! config('icon.upRight') !!}</span></a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection

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
                        <img loading="lazy" src="{{ asset($data['pageData']?->image) }}"
                            alt="{{ $data['pageData']?->title }}" id="scroll-zoom-img"
                            class="w-full h-full object-cover absolute inset-0">
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
    <section class="py-16 lg:py-24 bg-white">
        <div class="container">
            <div class="text-center mb-12 space-y-2.5" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium uppercase">
                    {{ $data['pageData']?->section_title }}
                </h2>
                <p class="text-lg">
                    {{ $data['pageData']?->section_description }}
                </p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-12 gap-8">
                @foreach ($data['why_choose'] as $index => $why)
                    <div class="{{ $index < 3 ? 'lg:col-span-4' : 'lg:col-span-6' }}">
                        <div class="bg-gray-100 rounded-2xl flex flex-col items-start py-5 px-5">

                            <!-- Image -->
                            <img loading="lazy" src="{{ asset($why?->image) }}" alt="{{ $why?->title }}"
                                class="w-full rounded-2xl hover:scale-105 duration-300 transition-all">

                            <!-- Content -->
                            <div class="w-full lg:ml-auto">
                                <h3 class="text-2xl tracking-wider font-bold text-black mt-4">
                                    {{ $why?->title }}
                                </h3>

                                <p>{{ $why?->short_description }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
           

        </div>
    </section>
@endsection

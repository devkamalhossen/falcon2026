@extends('frontend.master')
@section('page_title', $data['pageData']?->title)
@section('meta_data')
    <meta name="title" content="{{ $data['pageData']?->meta_title }}" />
    <meta name="description" content="{{ $data['pageData']?->meta_description }}" />
    <meta name="keywords" content="{{ $data['pageData']?->meta_keywords }}" />
@endsection
@section('main')
    <!-- Team Banner Section -->
  <section class="overflow-hidden ">
        <div class=" relative z-[-1]">
            <div class="relative text-center">
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-black font-medium uppercase animate__animated animate__fadeInUp">
                    {{ $data['pageData']?->title }}
                </h1>
                <h2
                    class="!z-[3] text-transparent [-webkit-text-stroke:1px_green] left-0 top-0 right-0 absolute text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase animate__animated animate__fadeInUp">
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
            <div class="text-center mb-12 space-y-2.5" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium uppercase">
                    {{ $data['pageData']?->section_title }}
                </h2>
                <p class="text-lg">
                    {{ $data['pageData']?->section_description }}
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-20">
                @foreach ($data['areas'] as $area)
                    <a href="{{route('single.service.area', $area->area_slug)}}" data-aos="fade-up">
                        <div class="group relative overflow-hidden">
                        <div class="aspect-[519/380] relative">
                            <img loading="lazy" src="{{ asset($area?->image) }}" alt="{{ $area?->area_name }}"
                                class="size-full object-cover">
                           
                            <div class="py-6 px-5 bg-black/20 absolute inset-x-0 bottom-0">
                                <h3 class="text-lg tracking-wider uppercase font-semibold text-white">
                                    {{ $area?->area_name }}</h3>
                            </div>
                        </div>
                        <div
                            class="bg-black/50 text-left text-[#fffaf4] flex flex-col gap-3 justify-center items-start text-base absolute inset-0 px-5 py-6 translate-y-full transition-all duration-700 ease-[cubic-bezier(0.72,0.2,0.16,1)] z-[2] group-hover:translate-y-0">
                            <h3 class="text-lg tracking-wider uppercase font-semibold text-white">{{ $area?->area_name }}
                            </h3>
                        </div>
                    </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>
@endsection

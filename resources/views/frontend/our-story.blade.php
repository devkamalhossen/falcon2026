@extends('frontend.master')
@section('page_title', $data['pageData']?->title)
@section('meta_data')
    <meta name="title" content="{{ $data['pageData']?->meta_title }}" />
    <meta name="description" content="{{ $data['pageData']?->meta_description }}" />
    <meta name="keywords" content="{{ $data['pageData']?->meta_keywords }}" />
@endsection
@section('main')
    <!-- ==================== Hero section end ==================== -->
    <section class="overflow-hidden ">
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
    <!-- ==================== Hero section end ==================== -->

    <!-- ==================== About section end ==================== -->
    <section class="py-16 lg:py-24 bg-[#ece5da]" data-aos="fade-up">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-16 sm:gap-20 md:gap-28 lg:gap-32 items-start">
                <div class="aspect-[563/707] overflow-hidden lg:sticky lg:top-20">
                    @if ($data['aboutData']?->image)
                        <img loading="lazy" src="{{ asset($data['aboutData']?->image) }}" alt="{{ $data['aboutData']?->title }}"
                            class="size-full">
                    @endif
                </div>
                <div class="space-y-8">
                    <h3 class="text-2xl md:text-3xl font-medium uppercase">{{ $data['aboutData']?->title }}</h3>
                    <div class="space-y-6 text-[24px] text-justify">
                        {!! $data['aboutData']?->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== About section end ==================== -->


    <!-- ==================== Visson Mission section end ==================== -->
    @if ($data['vision']->count() > 0)
        <section class="py-16 lg:py-24 " data-aos="fade-up">
            <div class="container">
                <div class="grid md:grid-cols-2 gap-20 items-start">
                    @foreach ($data['vision'] as $vision)
                        <div>
                            <h3
                                class="text-center text-3xl md:text-4xl lg:text-5xl font-medium uppercase tracking-[5px] md:tracking-[20px] lg:tracking-[40px] leading-tight">
                                {{ $vision->title }}
                            </h3>

                            <p class="mt-8 text-2xl text-justify w-full">
                                {{ $vision->short_description }}
                            </p>

                            @if ($vision->image)
                                <img loading="lazy" class="mt-6 w-full h-[400px]" src="{{ asset($vision->image) }}" alt="">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- ==================== Core Value Content end ==================== -->
    @if ($data['coreValueContent'])
        <section class="py-16 lg:py-24 " data-aos="fade-up">
            <div class="container">
                <div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-10">
                        <div>
                            <h3
                                class="text-3xl md:text-4xl lg:text-5xl font-medium uppercase tracking-[5px] md:tracking-[15px] lg:tracking-[30px] leading-tight">
                                {{ $data['coreValueContent']?->title }}
                            </h3>
                            <p class="mt-8 text-2xl leading-[160%] text-justify w-full">
                                {{ $data['coreValueContent']?->description }}
                            </p>
                        </div>

                        @if ($data['coreValueContent']?->image)
                            <img loading="lazy" class="mt-6 w-full h-[500px]" src="{{ asset($data['coreValueContent']?->image) }}"
                                alt="">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($data['founderMessage'])
        <section class="py-16 lg:py-24 " data-aos="fade-up">
            <div class="container">
                <div>
                    <div class="">
                        <div>
                            <h3
                                class="text-center text-3xl md:text-4xl lg:text-5xl font-medium uppercase tracking-[5px] md:tracking-[15px] lg:tracking-[30px] leading-tight">
                                {{ $data['founderMessage']?->title }}
                            </h3>

                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-10">
                                @if ($data['founderMessage']?->image)
                                    <img loading="lazy" class="mt-6 w-full h-[500px] object-contain"
                                        src="{{ asset($data['founderMessage']?->image) }}" alt="">
                                @endif
                                <div>
                                    <p class="mt-8 text-2xl text-justify w-full leading-[160%]">
                                        "{{ $data['founderMessage']?->description }}"
                                    </p>
                                    <p class="mt-8 font-bold text-2xl text-justify w-full">
                                        {{ $data['founderMessage']?->name }} - {{ $data['founderMessage']?->designation }}
                                    </p>
                                    <p class="font-bold text-2xl text-justify w-full">
                                        {{ $data['founderMessage']?->company }}
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    @endif


    <!-- ==================== Achievement section start ==================== -->
    <section class="relative py-16 lg:py-24 overflow-hidden"
        style="background-image: url('{{ asset('frontend/assets/images/achievement-bg.jpeg') }}'); background-size: cover; background-position: center;">

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Content -->
        <div class="relative container lg:max-w-7xl">
            <h3 class="text-3xl md:text-4xl lg:text-5xl font-bold text-center capitalize mb-12 text-white">
                {{ $data['achievementData']?->title }}
            </h3>

            <p class="mt-4 mb-12 text-2xl text-justify w-full text-white">
                {{ $data['achievementData']?->description }}
            </p>

            @php
                $achievements = $data['achievements'];
                $half = ceil($achievements->count() / 2);
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-3 items-center">

                <!-- Left Column Stats -->
                <div class="space-y-40 text-center">
                    @foreach ($achievements->take($half) as $achievement)
                        <div data-aos="fade-up">
                            <span class="block text-6xl font-bold text-primary counter">
                                {{ $achievement->numbers }}
                            </span>
                            <span class="text-xl tracking-wider uppercase font-bold text-white">
                                {{ $achievement->title }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <!-- Center Image -->
                <div class="flex justify-center">
                    <div class="swiper achievementSlider">
                        <div class="swiper-wrapper">

                            @foreach ($data['achievementSlider'] as $item)
                                <div class="swiper-slide">
                                    <img loading="lazy" src="{{ asset($item->image) }}" class="w-full rounded-xl h-auto"
                                        alt="Falcon Solution Limited">
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <!-- Right Column Stats -->
                <div class="space-y-40 text-center">
                    @foreach ($achievements->slice($half) as $achievement)
                        <div>
                            <span class="block text-6xl font-bold text-primary counter">
                                {{ $achievement->numbers }}
                            </span>
                            <span class="text-xl tracking-wider uppercase font-bold text-white">
                                {{ $achievement->title }}
                            </span>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- ==================== Achievement section end ==================== -->
    <section class="py-16 lg:py-24 bg-[#ece5da]" data-aos="fade-up">
        <div class="container">
            <div class="mb-4 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg cursor-pointer" id="profile-tab"
                            data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Profile</button>
                    </li>

                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg cursor-pointer" id="brochure-tab"
                            data-tabs-target="#brochure" type="button" role="tab" aria-controls="brochure"
                            aria-selected="false">Brochure</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden p-4 rounded-lg " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div
                        class="grid sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8 md:gap-10 lg:gap-12">
                        @foreach ($data['files']['profiles'] as $row)
                            <div class="group cursor-pointer relative">
                                <a target="_blank" href="{{ asset($row->file) }}">
                                    <div class="relative overflow-hidden aspect-[147/207]">
                                        <img loading="lazy" src="{{ asset($row->image) }}" alt="{{ $row->title }}"
                                            class="size-full group-hover:scale-105 duration-300" />
                                    </div>
                                    <p class="text-lg pt-5 font-medium text-dark">
                                        {{ $row->title }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="hidden p-4 rounded-lg " id="brochure" role="tabpanel" aria-labelledby="brochure-tab">
                    <div
                        class="grid sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8 md:gap-10 lg:gap-12">
                        @foreach ($data['files']['brochures'] as $row)
                            <div class="group cursor-pointer relative">
                                <a target="_blank" href="{{ asset($row->file) }}">
                                    <div class="relative overflow-hidden aspect-[147/207]">
                                        <img loading="lazy" src="{{ asset($row->image) }}" alt="{{ $row->title }}"
                                            class="size-full group-hover:scale-105 duration-300" />
                                    </div>
                                    <p class="text-lg pt-5 font-medium text-dark">
                                        {{ $row->title }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

 @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush
@push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper(".achievementSlider", {
            loop: true,

            // Disable controls
            navigation: false,
            pagination: false,

            autoplay: {
                delay: 500,
                disableOnInteraction: false,
            },

            speed: 800, // smooth transition

            slidesPerView: 1,
            spaceBetween: 10,
        });
    </script>
@endpush

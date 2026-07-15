@extends('frontend.master')
@section('page_title', $data['project']?->name)
@section('meta_data')
    <meta name="title" content="{{ $data['project']?->meta_title }}" />
    <meta name="description" content="{{ $data['project']?->meta_description }}" />
    <meta name="keywords" content="{{ $data['project']?->meta_keywords }}" />
@endsection
@section('main')
    <!-- Banner Section Start -->

    <section>
        <div class="container">
            <div class="relative text-center mb-20">
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl text-black font-medium uppercase animate__animated animate__fadeInUp ">
                    {{ $data['project']?->name }}
                </h1>
            </div>
        </div>

        <div id="scroll-container"
            class="relative bg-gray-100 overflow-hidden w-[80%] mx-auto -translate-y-5 md:-translate-y-7 lg:-translate-y-10 xl:-translate-y-14 -mb-14 ">
            <div class="h-[250px] sm:h-[350px] md:h-[450px] lg:h-[600px] xl:h-[800px] relative overflow-hidden">
                @if ($data['project']?->image)
                    <img loading="lazy" src="{{ asset($data['project']?->image) }}" alt="{{ $data['project']?->name }}"
                        id="scroll-zoom-img" class="w-full h-full object-cover absolute inset-0">
                @else
                    <img loading="lazy" src="{{ asset('frontend/assets/images/contact-img.jpg') }}"
                        alt="{{ $data['project']?->name }}" id="scroll-zoom-img"
                        class="w-full h-full object-cover absolute inset-0">
                @endif
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Description Section Start -->
    <section class="py-12 md:py-20 lg:py-24">
        <div class="container">
            <article class="format lg:format-lg max-w-full" data-aos="fade-up">
                {!! $data['project']->description !!}
            </article>
        </div>

    </section>
    <!-- Description Section End -->

    <!-- Gallary Slider Section Start -->
    @if ($data['project']?->galleries->count() > 0)
        <section data-aos="fade-up">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($data['project']?->galleries as $gallery)
                        <div class="swiper-slide">
                            <div class="bg-gray-100 aspect-[6/4]">
                                <img loading="lazy" src="{{ asset($gallery->image) }}" alt="{{ $data['project']->title }}"
                                    class="size-full">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-navigation flex items-center justify-between my-6 max-w-[56%] mx-auto">
                <button
                    class="gallery-swiper-button-prev flex items-center justify-center rounded-full border border-black text-black text-2xl size-14 hover:bg-primary hover:text-white duration-300 transition-all hover:border-primary cursor-pointer">
                    {!! config('icon.longArrowLeft') !!}
                </button>
                <button
                    class="gallery-swiper-button-next flex items-center justify-center rounded-full border border-black text-black text-2xl size-14 hover:bg-primary hover:text-white duration-300 transition-all hover:border-primary cursor-pointer">
                    {!! config('icon.longArrowRight') !!}
                </button>
            </div>
        </section>
    @endif
    <!-- Gallary Slider Section End -->

    @if ($data['project']->video_id)
        <section class="py-12 md:py-20 lg:py-24 bg-white/10" data-aos="fade-up">
            <div class="container">
                <iframe class="aspect-video"
                    src="https://www.youtube.com/embed/{{ $data['project']->video_id }}?si=ujrC-DOnV-hH_AWu"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>
    @endif

    <section class="py-12 md:py-20 lg:py-24 bg-primary/10" data-aos="fade-up">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-10">
                <div class="space-y-4">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl text-dark font-medium uppercase">
                        Interested?
                    </h2>
                    <h5 class="text-xl md:text-2xl lg:text-3xl uppercase text-dark font-medium">Get In touch</h5>
                </div>
                <form id="contactForm" method="POST" class="space-y-6" action="{{ route('contact.form.submit') }}">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $data['project']->id }}">
                    <div>
                        <input type="text" placeholder="Name *"
                            class="w-full bg-transparent border-0 border-b border-gray-600 p-0 focus:border-primary focus:ring-0 py-3 focus:outline-none transition-colors duration-300"
                            name="name" required>
                        <span class="text-red-500 text-sm error-name"></span>
                    </div>

                    <div>
                        <input type="email" placeholder="Email *"
                            class="w-full bg-transparent border-0 border-b border-gray-600 p-0 focus:border-primary focus:ring-0 py-3 focus:outline-none transition-colors duration-300"
                            name="email" required>
                        <span class="text-red-500 text-sm error-email"></span>
                    </div>

                    <div>
                        <input type="text" placeholder="Phone Number *"
                            class="w-full bg-transparent border-0 border-b border-gray-600 p-0 focus:border-primary focus:ring-0 py-3 focus:outline-none transition-colors duration-300"
                            name="phone">
                        <span class="text-red-500 text-sm error-phone"></span>
                    </div>

                    <div>
                        <textarea placeholder="Message *" rows="2"
                            class="w-full bg-transparent border-0 border-b border-gray-600 p-0 focus:border-primary focus:ring-0 py-3 focus:outline-none resize-none transition-colors duration-300"
                            name="message" required></textarea>
                        <span class="text-red-500 text-sm error-message"></span>
                    </div>

                    <div class="pt-4 h-20">
                        <button type="submit"
                            class="flex items-center space-x-3 hover:text-primary cursor-pointer group hover:scale-110 duration-300 hover:space-x-4 hover:translate-x-2">
                            <div
                                class="size-8 border border-dark rounded-full flex items-center justify-center relative z-[1] after:absolute after:left-0 after:top-1/2 after:-translate-y-1/2 after:w-0 after:h-0 after:bg-primary after:z-[-1] group-hover:after:h-full group-hover:after:w-full group-hover:text-white overflow-hidden after:rounded-full after:duration-300 group-hover:border-primary">
                                {!! config('icon.arrowRightLine') !!}
                            </div>
                            <span class="font-semibold">SUBMIT</span>
                        </button>
                        <div id="formMessage" class="mt-4"></div>
                    </div>
                </form>

            </div>
        </div>
    </section>


    <!-- More Service Section Start -->
    @if ($data['moreProjects']->count() > 0)
        <section class="py-12 md:py-20 lg:py-24" data-aos="fade-up">
            <div class="container relative space-y-20">
                <h3 class="text-3xl md:text-4xl lg:text-5xl text-dark font-medium uppercase">
                    Explore More Service
                </h3>
                <div class="swiper moreServiceSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($data['moreProjects'] as $project)
                            <div class="swiper-slide">
                                <a href="{{ route('project.details', $project->slug) }}"
                                    class="group block cursor-pointer overflow-hidden relative aspect-square">
                                    <img loading="lazy" src="{{ asset($project->image) }}" alt="{{ $project->name }}"
                                        class="size-full group-hover:scale-105 duration-300" />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent flex items-end p-10">
                                        <p class="md:text-2xl font-medium text-white">
                                            {{ $service->name }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-navigation flex items-center gap-5 mt-5">
                    <button
                        class="more-service-swiper-button-prev flex items-center justify-center rounded-full border border-black text-black text-2xl size-14 hover:bg-primary hover:text-white duration-300 transition-all hover:border-primary cursor-pointer">
                        {!! config('icon.longArrowLeft') !!}
                    </button>
                    <button
                        class="more-service-swiper-button-next flex items-center justify-center rounded-full border border-black text-black text-2xl size-14 hover:bg-primary hover:text-white duration-300 transition-all hover:border-primary cursor-pointer">
                        {!! config('icon.longArrowRight') !!}
                    </button>
                </div>
            </div>
        </section>
    @endif
    <!-- More Service Section End -->

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @endpush

    @push('scripts')
        <script>
            // Gallery Slider
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1.75,
                centeredSlides: true,
                loop: true,
                grabCursor: true,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.gallery-swiper-button-next',
                    prevEl: '.gallery-swiper-button-prev',
                },
            });

            var moreServiceSwiper = new Swiper(".moreServiceSwiper", {
                slidesPerView: 3,
                centeredSlides: true,
                loop: true,
                grabCursor: true,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.more-service-swiper-button-next',
                    prevEl: '.more-service-swiper-button-prev',
                },
            });
        </script>

        <script>
            document.querySelectorAll("[id^='accordion']").forEach((accordion) => {
                const headers = accordion.querySelectorAll(".accordion-header");

                headers.forEach((button) => {
                    button.addEventListener("click", () => {
                        const body = button.nextElementSibling;
                        const icon = button.querySelector("svg");
                        const isOpen = body.style.maxHeight;

                        // Close all in this accordion only
                        accordion.querySelectorAll(".accordion-body").forEach((el) => {
                            el.style.maxHeight = null;
                        });
                        accordion.querySelectorAll(".accordion-header svg").forEach((el) => {
                            el.classList.remove("rotate-180");
                        });

                        // Toggle clicked item
                        if (!isOpen) {
                            body.style.maxHeight = body.scrollHeight + "px";
                            icon.classList.add("rotate-180");
                        }
                    });
                });
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#contactForm").on("submit", function(e) {
                    e.preventDefault();

                    let form = $(this);
                    let formData = form.serialize();

                    // Clear old errors & messages
                    $(".error-name, .error-email, .error-phone, .error-message").text("");
                    $("#formMessage").html("");

                    $.ajax({
                        url: form.attr("action"),
                        method: "POST",
                        data: formData,
                        success: function(response) {
                            $("#formMessage").html(
                                `<p class="text-green-600 font-semibold">${response.message}</p>`
                            );
                            form[0].reset();
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function(field, messages) {
                                    $(".error-" + field).text(messages[0]);
                                });
                            } else {
                                $("#formMessage").html(
                                    `<p class="text-red-600 font-semibold">Something went wrong. Try again!</p>`
                                );
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection

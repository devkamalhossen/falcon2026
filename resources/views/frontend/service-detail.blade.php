@extends('frontend.master')
@section('page_title', $data['service']?->title)
@section('meta_data')
    <meta name="title" content="{{ $data['service']?->meta_title }}" />
    <meta name="description" content="{{ $data['service']?->meta_description }}" />
    <meta name="keywords" content="{{ $data['service']?->meta_keywords }}" />
    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $data['service']?->meta_title ?? $data['service']?->title }}" />
    <meta property="og:description" content="{{ $data['service']?->meta_description }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset($data['service']?->image) ?? get_option('site_logo') }}" />

    <!-- Optional but recommended -->
    <meta property="og:site_name" content="{{ get_option('site_name') ?? 'Falcon Solution Ltd' }}" />


    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $data['service']?->meta_title ?? $data['service']?->title }}" />
    <meta name="twitter:description" content="{{ $data['service']?->meta_description }}" />
    <meta name="twitter:image" content="{{ asset($data['service']?->image) ?? get_option('site_logo') }}" />

    <link rel="stylesheet" href="{{ asset('custome.css') }}">

    {!! $data['service']?->meta_scripts !!}
@endsection

@push('styles')
    <style>
        .mySwiper .swiper-wrapper {
            transition-timing-function: linear !important;
        }
    </style>
@endpush
@section('main')
    {{-- Banner Slider --}}
    @if ($data['service']?->galleries->count() > 0)
        <div class="container relative ">
            <div class=" text-center ">
                <h1 class="text-xl md:text-3xl lg:text-5xl py-3  font-bold uppercase mb-4">
                    {{ $data['service']?->title }}
                </h1>
                <p class="ql-size-large" style="margin-left: 150px; margin-right:150px; margin-bottom:50px"> {!! $data['service']?->description !!}</p>
            </div>
        </div>
        <div class="bg-white ">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($data['service']?->galleries as $gallery)
                        <div class="swiper-slide">
                            <div class="bg-gray-100">
                                <img loading="lazy" src="{{ asset($gallery->image) }}" alt="{{ $data['service']->title }}"
                                    class="size-full transform transition duration-300 ease-in-out hover:scale-108">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <section class="overflow-hidden z-[1] bg-[#6a994e] pt-6">
            <div class="container relative ">
                <div class="relative ">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-white font-medium uppercase">
                        {{ $data['service']?->title }}
                    </h1>
                    <h1
                        class="!z-[3] text-transparent [-webkit-text-stroke:1px_white] left-0 top-0 right-0 absolute text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase">
                        {{ $data['service']?->title }}
                    </h1>
                </div>
            </div>
            <div class=" h-[400px] sm:h-[500px] md:h-[600px] lg:h-[900px] relative z-[2] bg-gray-100 -translate-y-14 ">

                <img loading="lazy" src="{{ asset($data['service']->image) }}" alt="{{ $data['service']->title }}"
                    class="w-full h-full object-cover absolute inset-0">
            </div>
        </section>
    @endif
    {{-- End Banner Slider --}}


    <!-- start of quote section devkamal -->
    <section class="quote-section">
        <div class="quote-content">
            <h2>Get a PU Flooring Quote Today</h2>
            <p>Talk to our flooring engineer — same-day response, no obligation.</p>
        </div>
        <div class="quote-buttons">
            <a href="tel:01329742200" class="btn btn-call">
            <i class="fas fa-phone-alt"></i> Call Now: 01329-742200
            </a>
            <a href="https://wa.me/+8801329742200" class="btn btn-whatsapp" target="_blank">
            <i class="fab fa-whatsapp"></i> WhatsApp Us
            </a>
        </div>
    </section>
        <!-- end of quote section devkamal -->



    <!-- Description Section Start -->
    @if ($data['service']?->descriptions->count() > 0)
        <section class="bg-white py-12 md:py-20 lg:py-24">
            <div class="container">
                {{-- <article class="format lg:format-lg max-w-full">
            
            </article> --}}

                @foreach ($data['service']?->descriptions as $index => $description)
                    @if ($index % 2 == 0)
                        <div class="flex lg:flex-row flex-col lg:gap-15 gap-5 lg:mb-20 mb-10">
                            <div class="flex-1">
                                <h3 class="text-black font-bold text-[28px] mb-3">{{ $description->title }}</h3>
                                {!! $description->description !!}
                            </div>
                            <div class="flex-1">
                                <img loading="lazy" src="{{ asset($description->image) }}" alt="{{ $description->title }}"
                                    class="rounded-xl w-full h-auto transform transition duration-300 ease-in-out hover:scale-108">
                            </div>
                        </div>
                    @else
                        <div class="flex lg:flex-row flex-col lg:gap-15 gap-5 lg:mb-20 mb-10">
                            <div class="flex-1">
                                <img loading="lazy" src="{{ asset($description->image) }}" alt="{{ $description->title }}"
                                    class="rounded-xl w-full h-auto transform transition duration-300 ease-in-out hover:scale-104">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-black text-[28px] font-bold mb-3">{{ $description->title }}</h3>
                                {!! $description->description !!}

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </section>
    @endif
    <!-- Description Section End -->
    @if ($data['service']?->features->count() > 0)
        <section class="bg-white  py-12 md:py-20 lg:py-24">
            <div class="container">
                <h3
                    class="text-2xl mb-8 md:text-3xl lg:text-4xl text-center tracking-widest lg:tracking-[10px] uppercase font-bold">
                    Feature</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 lg:gap-10">
                    @foreach ($data['service']?->features as $feature)
                        <div class="group border-[1px] border-gray-300 rounded-xl px-3 py-3">
                            @if ($feature->image)
                                <img loading="lazy" src="{{ asset($feature->image) }}" alt="{{ $feature->title }}"
                                    class="transform transition duration-300 ease-in-out group-hover:scale-108 rounded-xl" />
                            @endif
                            <p class="text-2xl text-center text-green-600 pt-4 mb-4 font-bold">
                                {{ $feature->title }}
                            </p>
                            {{-- <p class="lead text-justify mt-2 text-[24px]"> --}}
                            {!! $feature->short_description !!}
                            {{-- </p> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- start of assessment area devkamal  -->
    <section class="devkamal-assessment-wrapper">
        <div class="devkamal-assessment-container">
            <h3 class="devkamal-title">Not sure which PU system fits your facility?</h3>
            <p class="devkamal-description">
            Our engineers assess your floor's load, chemical exposure, and budget — then recommend the right PU thickness and finish. No cost, no pressure.
            </p>
            <a href="{{ route('contact') }}" id="devkamal-assessment-btn" class="devkamal-btn" target="_blank">
            Request Free Floor Assessment &rarr;
            </a>
        </div>
    </section>
    <!-- end of assessment area devkamal  -->

    <!-- Benefit Start -->
    @if ($data['service']?->benefits->count() > 0)
        <section class="bg-white  py-12 md:py-20 lg:py-24">
            <div class="container">
                <h3
                    class="text-2xl mb-8 md:text-3xl lg:text-4xl text-center tracking-widest lg:tracking-[10px] uppercase font-bold">
                    Benefits</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8 lg:gap-10">
                    @foreach ($data['service']?->benefits as $benefit)
                        <div class="group border-[1px] border-gray-300 rounded-xl px-3 py-3">
                            @if ($benefit->image)
                                <img loading="lazy" src="{{ asset($benefit->image) }}" alt="{{ $benefit->title }}"
                                    class="transform transition duration-300 ease-in-out group-hover:scale-108 rounded-xl" />
                            @endif
                            <p class="text-2xl text-center text-green-600 pt-4 font-bold  mb-4">
                                {{ $benefit->title }}
                            </p>
                            {{-- <p class="lead text-justify text-[24px] mt-2"> --}}
                            {!! $benefit->short_description !!}
                            {{-- </p> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    @endif
    <!-- Benefit Section End -->


    <!-- start of pricing area devkamalhossen  -->
    {{--<section class="devkamal-pricing-wrapper">
        <div class="devkamal-pricing-header">
            <h2 class="text-2xl mb-12 md:text-3xl lg:text-4xl text-center uppercase font-bold tracking-widest lg:tracking-[10px]">PU FLOORING PRICING</h2>
            <p class="ql-size-large" style="margin: 0px 150px 0px 150px;">Indicative starting rates per square foot for Bangladesh projects. Final pricing depends on substrate condition, coating thickness, and site access — request a free site visit for an exact quote.</p>
        </div>

        <div class="devkamal-pricing-grid">
            <!-- Basic Plan -->
            <div class="devkamal-card">
            <h3>Basic PU Coating</h3>
            <p class="devkamal-price">৳180<span>-220</span></p>
            <small>per sq.ft (starting)</small>
            <ul class="devkamal-features">
                <li>✓ 2-coat PU system</li>
                <li>✓ Basic slip resistance</li>
                <li>✓ Single color finish</li>
                <li>✓ 1-year workmanship warranty</li>
            </ul>
            <a href="#" class="devkamal-btn-outline">Get Quote</a>
            </div>

            <!-- Standard Plan (Most Popular) -->
            <div class="devkamal-card devkamal-popular">
            <div class="devkamal-badge">MOST POPULAR</div>
            <h3>Standard PU Flooring</h3>
            <p class="devkamal-price">৳280<span>-350</span></p>
            <small>per sq.ft (starting)</small>
            <ul class="devkamal-features">
                <li>✓ 3-coat PU system with primer</li>
                <li>✓ Chemical & impact resistant</li>
                <li>✓ Seamless, hygienic finish</li>
                <li>✓ Slip-resistant texture option</li>
                <li>✓ 3-year workmanship warranty</li>
            </ul>
            <a href="#" class="devkamal-btn-solid">Get Quote</a>
            </div>

            <!-- Premium Plan -->
            <div class="devkamal-card">
            <h3>Premium PU System</h3>
                <p class="devkamal-price">৳400<span>+</span></p>
                <small>per sq.ft (starting)</small>
                <ul class="devkamal-features">
                    <li>✓ Multi-layer PU with anti-bacterial additive</li>
                    <li>✓ Thermal-shock & extreme chemical resistance</li>
                    <li>✓ Custom color & coving detail</li>
                    <li>✓ Full substrate preparation included</li>
                    <li>✓ 5-year workmanship warranty</li>
                </ul>
                <a href="#" class="devkamal-btn-outline">Get Quote</a>
                </div>
            </div>
    </section>--}}
    <!-- end of pricing area devkamalhossen  -->

    <!-- usageAreas Start -->
    @if ($data['service']?->usageAreas->count() > 0)
        <section class="bg-white  py-12 md:py-20 lg:py-24">
            <div class="container">
                <h3
                    class="text-2xl mb-12 md:text-3xl lg:text-4xl text-center uppercase font-bold tracking-widest lg:tracking-[10px]">
                    Usage Of Areas
                </h3>

                <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-4">
                    @foreach ($data['service']?->usageAreas as $usage)
                        <div
                            class="group flex flex-col lg:flex-row items-start gap-6 border border-black/20 rounded-lg bg-white p-6">

                            @if ($usage->image)
                                <div class="w-full lg:w-60 aspect-square flex-shrink-0">
                                    <img loading="lazy" src="{{ asset($usage->image) }}" alt="{{ $usage->title }}"
                                        class="w-full h-full object-cover transform transition duration-300 ease-in-out group-hover:scale-108 rounded-xl" />
                                </div>
                            @endif

                            <div class="min-w-0">
                                <h4 class="text-3xl font-semibold text-green-600 break-words  mb-4">{{ $usage->title }}
                                </h4>
                                {{-- <p class="mt-2 text-gray-600 text-justify text-[24px] lead break-words"> --}}
                                {!! $usage->short_description !!}
                                {{-- </p> --}}
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- usageAreas Section End -->

    <!-- start of three section from here devkamalhossen  -->
    <section class="devkamal-stats-wrapper">
        <div class="devkamal-stats-grid">
            <div class="devkamal-stat-item">
            <h3>500+</h3>
            <p>Sq.Ft of PU Floors Installed</p>
            </div>
            <div class="devkamal-stat-item">
            <h3>10+</h3>
            <p>Years Serving BD Industries</p>
            </div>
            <div class="devkamal-stat-item">
            <h3>100+</h3>
            <p>Factories & Hospitals Trust Us</p>
            </div>
            <div class="devkamal-stat-item">
            <h3>24/7</h3>
            <p>Site Support & Consultation</p>
            </div>
        </div>
        
        <div class="devkamal-cta-section">
            <p>Join the factories already protecting their floors with Falcon.</p>
            <a href="#" class="devkamal-cta-btn">Get Your Free Quote</a>
        </div>
        </section>

        <section class="devkamal-gallery-wrapper">
            <h2 class="devkamal-gallery-title">PROJECT GALLERY — BEFORE & AFTER</h2>
            
            <div class="devkamal-gallery-grid">
                <!-- Item 1 -->
                <div class="devkamal-gallery-card">
                <div class="devkamal-img-box">
                    <div class="devkamal-before">BEFORE</div>
                    <div class="devkamal-after">AFTER</div>
                </div>
                <h3>Garment Factory Floor, Gazipur</h3>
                <p>Cracked, dust-shedding concrete resurfaced with a slip-resistant PU system for the cutting floor.</p>
                </div>

                <!-- Item 2 -->
                <div class="devkamal-gallery-card">
                <div class="devkamal-img-box">
                    <div class="devkamal-before">BEFORE</div>
                    <div class="devkamal-after">AFTER</div>
                </div>
                <h3>Cold Storage Facility, Chattogram</h3>
                <p>Thermal-shock resistant PU flooring installed to withstand sub-zero to ambient temperature cycles.</p>
                </div>

                <!-- Item 3 -->
                <div class="devkamal-gallery-card">
                <div class="devkamal-img-box">
                    <div class="devkamal-before">BEFORE</div>
                    <div class="devkamal-after">AFTER</div>
                </div>
                <h3>Hospital Corridor, Dhaka</h3>
                <p>Seamless anti-bacterial PU floor replacing porous tile to meet infection-control standards.</p>
                </div>
            </div>
            
            <p class="devkamal-footer-text">Sample project photography for illustration — contact us for a full portfolio of completed sites.</p>
        </section>

        <section class="devkamal-cs-wrapper">
    <h2 class="devkamal-cs-title">CASE STUDIES</h2>
    <div class="devkamal-cs-grid">
        <!-- Case Study 1: Garment Factory -->
        <div class="devkamal-cs-card">
        <div class="devkamal-cs-header">Garment Factory</div>
        <div class="devkamal-cs-body">
            <h3>Cutting Floor Resurfacing for a Garment Factory</h3>
            <div class="devkamal-details">
            <span><strong>AREA:</strong> 18,000 sq.ft</span>
            <span><strong>INDUSTRY:</strong> Garments / RMG</span>
            <span><strong>SOLUTION:</strong> Standard PU System</span>
            <span><strong>TIMELINE:</strong> 6 days</span>
            </div>
            <div class="devkamal-outcome">
            <strong>Outcome:</strong> Eliminated dust generation on the cutting floor and reduced downtime for cleaning, with zero cracking reported after one monsoon season.
            </div>
        </div>
        </div>

        <!-- Case Study 2: Cold Storage -->
        <div class="devkamal-cs-card">
        <div class="devkamal-cs-header">Cold Storage</div>
        <div class="devkamal-cs-body">
            <h3>Thermal-Shock Flooring for a Cold Storage Warehouse</h3>
            <div class="devkamal-details">
            <span><strong>AREA:</strong> 12,500 sq.ft</span>
            <span><strong>INDUSTRY:</strong> Cold Storage / Logistics</span>
            <span><strong>SOLUTION:</strong> Premium PU System</span>
            <span><strong>TIMELINE:</strong> 9 days</span>
            </div>
            <div class="devkamal-outcome">
            <strong>Outcome:</strong> Floor withstood repeated freeze-thaw cycling with no delamination, passing food-safety audit on first inspection.
            </div>
        </div>
        </div>

        <!-- Case Study 3: Hospital -->
        <div class="devkamal-cs-card">
            <div class="devkamal-cs-header">Hospital</div>
                <div class="devkamal-cs-body">
                    <h3>Anti-Bacterial Flooring for a Private Hospital</h3>
                    <div class="devkamal-details">
                    <span><strong>AREA:</strong> 7,200 sq.ft</span>
                    <span><strong>INDUSTRY:</strong> Healthcare</span>
                    <span><strong>SOLUTION:</strong> Premium PU System</span>
                    <span><strong>TIMELINE:</strong> 5 days (phased)</span>
                    </div>
                    <div class="devkamal-outcome">
                    <strong>Outcome:</strong> Seamless finish helped the facility meet infection-control requirements while installation was phased to keep the corridor operational.
                    </div>
                </div>
                </div>
            </div>
        <p class="devkamal-cs-footer">Figures illustrative of typical project scope — request references for verified client results.</p>
    </section>

     <section class="devkamal-download-wrapper">
        <div class="devkamal-download-content">
            <div class="devkamal-icon">
            <!-- SVG Download Icon -->
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
            </svg>
            </div>
            
            <div class="devkamal-text">
            <small>FREE DOWNLOAD</small>
            <h2>Get the Free Flooring Cost Calculator (PDF)</h2>
            <p>Estimate your project cost in minutes — enter your area and application, and the calculator walks you through expected PU flooring pricing tiers for Bangladesh sites.</p>
            </div>
            
            <form class="devkamal-download-form">
            <input type="email" placeholder="Your work email" required>
            <button type="submit">Download PDF</button>
            </form>
        </div>
    </section>

    <!-- end of three section from here devkamalhossen  -->



    {{-- FAQa --}}
    @if ($data['service']?->faqs->count() > 0)
        <section class="bg-white py-12 md:py-20 lg:py-24">
            <div class="container">

                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-black">
                        Frequently Asked Questions
                    </h2>
                    <p class="text-gray-500 mt-3 text-[18px]">
                        Find answers to common questions about our service.
                    </p>
                </div>

                <div class="space-y-4">
                    @foreach ($data['service']?->faqs as $index => $faq)
                        <div class="faq-item border border-black/20 rounded-lg overflow-hidden">

                            <button
                                class="faq-question w-full flex justify-between items-center p-5 text-left cursor-pointer bg-primary/10 hover:bg-primary/50 transition">

                                <span class="text-[22px] font-semibold text-gray-800">
                                    {{ $faq->title }}
                                </span>

                                <svg class="faq-icon w-5 h-5 transition-transform" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>

                            </button>

                            <div class="faq-answer hidden p-5 text-black bg-gray-50 lg:text-[22px] text-[18px]">
                                {!! $faq->description !!}
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif


     <!-- start of contact section from here devkamalhossen  -->
    <section class="devkamal-contact-main-wrapper">
        <div class="devkamal-info-bar">
            <div class="devkamal-info-text">
            <h4>Still have a question we haven't answered?</h4>
            <p>Get a straight answer on PU flooring cost, timeline, or suitability for your site — talk to our team directly.</p>
            </div>
            <div class="devkamal-info-btns">
            <a href="tel:01329742200" class="btn-call">Call Us</a>
            <a href="https://wa.me/+8801329742200" class="btn-whatsapp" target="_blank">WhatsApp</a>
            </div>
        </div>
        <div class="devkamal-form-section">
            <div class="devkamal-contact-details">
            <small>PREFER TO TALK NOW?</small>
            <h2>Reach Our Flooring Team Directly</h2>
            <p>Usually faster than the form — most calls get an answer the same day.</p>
            
            <div class="contact-box">Call us: 01329-742200</div>
            <div class="contact-box">WhatsApp: +880 1744-798865</div>
            </div>

            <div class="devkamal-inquiry-form">
            <h3>INTERESTED?</h3>
            <p>Get In Touch</p>
              <form id="contactForm" method="POST" class="space-y-6" action="{{ route('contact.form.submit') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $data['service']->id }}">
                <input type="text" placeholder="Name" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="tel" placeholder="Phone Number" name="phone">
                <textarea placeholder="Message" name="message" required></textarea>
                   <button type="submit"
                    class="flex items-center space-x-3 hover:text-primary cursor-pointer group hover:scale-110 duration-300 hover:space-x-4 hover:translate-x-2">
                    <div
                        class="size-8 border border-dark rounded-full flex items-center justify-center relative z-[1] after:absolute after:left-0 after:top-1/2 after:-translate-y-1/2 after:w-0 after:h-0 after:bg-primary after:z-[-1] group-hover:after:h-full group-hover:after:w-full group-hover:text-white overflow-hidden after:rounded-full after:duration-300 group-hover:border-primary">
                        {!! config('icon.arrowRightLine') !!}
                    </div>
                    <span class="font-semibold">SUBMIT</span>
                </button>
                <div id="formMessage" class="mt-4"></div>
            </form>
            </div>
        </div>
    </section>
    <!-- end of contact section from here devkamalhossen  -->

    {{--<section class="bg-white  py-12 md:py-20 lg:py-24 bg-primary/10">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-10">
                <div class="space-y-4">
                    <h4 class="text-3xl md:text-4xl lg:text-5xl text-dark font-medium uppercase">
                        Interested?
                    </h4>
                    <h5 class="text-xl md:text-2xl lg:text-3xl uppercase text-dark font-medium">Get In touch</h5>
                </div>
                <form id="contactForm" method="POST" class="space-y-6" action="{{ route('contact.form.submit') }}">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $data['service']->id }}">
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
    </section>--}}

    <!-- More Service Section Start -->
    @if ($data['moreServices']->count() > 0)
        <section class="py-12 md:py-20 lg:py-24">
            <div class="container relative space-y-20">
                <h2 class="text-3xl md:text-4xl lg:text-5xl text-dark font-medium uppercase">
                    Explore More Service
                </h2>
                <div class="swiper moreServiceSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($data['moreServices'] as $service)
                            <div class="swiper-slide">
                                <a href="{{ route('service.detail', $service->slug) }}"
                                    class="group block cursor-pointer overflow-hidden relative aspect-square">
                                    <img loading="lazy" src="{{ asset($service->image) }}" alt="{{ $service->title }}"
                                        class="size-full group-hover:scale-105 duration-300" />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent flex items-end p-10">
                                        <p class="md:text-2xl font-medium text-white">
                                            {{ $service->title }}
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
                loop: true,
                spaceBetween: 5,
                speed: 3000,
                direction: 'horizontal',
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                },
                freeMode: true,
                breakpoints: {

                    0: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },

                    640: {
                        slidesPerView: 2,
                        spaceBetween: 15
                    },

                    768: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },

                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    },

                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 50
                    }

                }

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
        <script>
            document.querySelectorAll('.faq-question').forEach((button) => {

                button.addEventListener('click', () => {

                    const faqItem = button.parentElement;
                    const answer = faqItem.querySelector('.faq-answer');
                    const icon = faqItem.querySelector('.faq-icon');

                    const isOpen = !answer.classList.contains('hidden');

                    // close all
                    document.querySelectorAll('.faq-answer').forEach(el => el.classList.add('hidden'));
                    document.querySelectorAll('.faq-icon').forEach(el => el.classList.remove('rotate-180'));

                    // open clicked one
                    if (!isOpen) {
                        answer.classList.remove('hidden');
                        icon.classList.add('rotate-180');
                    }

                });

            });
        </script>
    @endpush
@endsection

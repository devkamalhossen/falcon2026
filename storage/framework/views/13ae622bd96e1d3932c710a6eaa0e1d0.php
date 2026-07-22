<?php $__env->startSection('page_title', $data['service']?->title); ?>
<?php $__env->startSection('meta_data'); ?>
    <meta name="title" content="<?php echo e($data['service']?->meta_title); ?>" />
    <meta name="description" content="<?php echo e($data['service']?->meta_description); ?>" />
    <meta name="keywords" content="<?php echo e($data['service']?->meta_keywords); ?>" />
    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo e($data['service']?->meta_title ?? $data['service']?->title); ?>" />
    <meta property="og:description" content="<?php echo e($data['service']?->meta_description); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:image" content="<?php echo e(asset($data['service']?->image) ?? get_option('site_logo')); ?>" />

    <!-- Optional but recommended -->
    <meta property="og:site_name" content="<?php echo e(get_option('site_name') ?? 'Falcon Solution Ltd'); ?>" />


    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo e($data['service']?->meta_title ?? $data['service']?->title); ?>" />
    <meta name="twitter:description" content="<?php echo e($data['service']?->meta_description); ?>" />
    <meta name="twitter:image" content="<?php echo e(asset($data['service']?->image) ?? get_option('site_logo')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('custome.css')); ?>">

    <?php echo $data['service']?->meta_scripts; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .mySwiper .swiper-wrapper {
            transition-timing-function: linear !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>
    
    <?php if($data['service']?->galleries->count() > 0): ?>
        <div class="container relative ">
            <div class=" text-center ">
                <h1 class="text-xl md:text-3xl lg:text-5xl py-3  font-bold uppercase mb-4">
                    <?php echo e($data['service']?->title); ?>

                </h1>
                <p class="ql-size-large" style="margin-left: 150px; margin-right:150px; margin-bottom:50px"> <?php echo $data['service']?->description; ?></p>
            </div>
        </div>
        <div class="bg-white ">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $data['service']?->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="bg-gray-100">
                                <img loading="lazy" src="<?php echo e(asset($gallery->image)); ?>" alt="<?php echo e($data['service']->title); ?>"
                                    class="size-full transform transition duration-300 ease-in-out hover:scale-108">
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <section class="overflow-hidden z-[1] bg-[#6a994e] pt-6">
            <div class="container relative ">
                <div class="relative ">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-white font-medium uppercase">
                        <?php echo e($data['service']?->title); ?>

                    </h1>
                    <h1
                        class="!z-[3] text-transparent [-webkit-text-stroke:1px_white] left-0 top-0 right-0 absolute text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase">
                        <?php echo e($data['service']?->title); ?>

                    </h1>
                </div>
            </div>
            <div class=" h-[400px] sm:h-[500px] md:h-[600px] lg:h-[900px] relative z-[2] bg-gray-100 -translate-y-14 ">

                <img loading="lazy" src="<?php echo e(asset($data['service']->image)); ?>" alt="<?php echo e($data['service']->title); ?>"
                    class="w-full h-full object-cover absolute inset-0">
            </div>
        </section>
    <?php endif; ?>
    


    <!-- start of quote section devkamal -->
    <section class="quote-section">
        <div class="quote-content">
            <h2>Get a  <?php echo e($data['service']?->title); ?></h2>
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
    <?php if($data['service']?->descriptions->count() > 0): ?>
        <section class="bg-white py-12 md:py-20 lg:py-24">
            <div class="container">
                

                <?php $__currentLoopData = $data['service']?->descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($index % 2 == 0): ?>
                        <div class="flex lg:flex-row flex-col lg:gap-15 gap-5 lg:mb-20 mb-10">
                            <div class="flex-1">
                                <h3 class="text-black font-bold text-[28px] mb-3"><?php echo e($description->title); ?></h3>
                                <?php echo $description->description; ?>

                            </div>
                            <div class="flex-1">
                                <img loading="lazy" src="<?php echo e(asset($description->image)); ?>" alt="<?php echo e($description->title); ?>"
                                    class="rounded-xl w-full h-auto transform transition duration-300 ease-in-out hover:scale-108">
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex lg:flex-row flex-col lg:gap-15 gap-5 lg:mb-20 mb-10">
                            <div class="flex-1">
                                <img loading="lazy" src="<?php echo e(asset($description->image)); ?>" alt="<?php echo e($description->title); ?>"
                                    class="rounded-xl w-full h-auto transform transition duration-300 ease-in-out hover:scale-104">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-black text-[28px] font-bold mb-3"><?php echo e($description->title); ?></h3>
                                <?php echo $description->description; ?>


                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </section>
    <?php endif; ?>
    <!-- Description Section End -->
    <?php if($data['service']?->features->count() > 0): ?>
        <section class="bg-white  py-12 md:py-20 lg:py-24">
            <div class="container">
                <h3
                    class="text-2xl mb-8 md:text-3xl lg:text-4xl text-center tracking-widest lg:tracking-[10px] uppercase font-bold">
                    Feature</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 lg:gap-10">
                    <?php $__currentLoopData = $data['service']?->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="group border-[1px] border-gray-300 rounded-xl px-3 py-3">
                            <?php if($feature->image): ?>
                                <img loading="lazy" src="<?php echo e(asset($feature->image)); ?>" alt="<?php echo e($feature->title); ?>"
                                    class="transform transition duration-300 ease-in-out group-hover:scale-108 rounded-xl" />
                            <?php endif; ?>
                            <p class="text-2xl text-center text-green-600 pt-4 mb-4 font-bold">
                                <?php echo e($feature->title); ?>

                            </p>
                            
                            <?php echo $feature->short_description; ?>

                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- start of assessment area devkamal  -->
    <section class="devkamal-assessment-wrapper">
        <div class="devkamal-assessment-container">
            <h3 class="devkamal-title">Not sure which <?php echo e($data['service']?->title); ?></h3>
            <p class="devkamal-description">
            Our engineers assess your floor's load, chemical exposure, and budget — then recommend the right PU thickness and finish. No cost, no pressure.
            </p>
            <a href="<?php echo e(route('contact')); ?>" id="devkamal-assessment-btn" class="devkamal-btn" target="_blank">
            Request Free Floor Assessment &rarr;
            </a>
        </div>
    </section>
    <!-- end of assessment area devkamal  -->

    <!-- Benefit Start -->
    <?php if($data['service']?->benefits->count() > 0): ?>
        <section class="bg-white  py-12 md:py-20 lg:py-24">
            <div class="container">
                <h3
                    class="text-2xl mb-8 md:text-3xl lg:text-4xl text-center tracking-widest lg:tracking-[10px] uppercase font-bold">
                    Benefits</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8 lg:gap-10">
                    <?php $__currentLoopData = $data['service']?->benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="group border-[1px] border-gray-300 rounded-xl px-3 py-3">
                            <?php if($benefit->image): ?>
                                <img loading="lazy" src="<?php echo e(asset($benefit->image)); ?>" alt="<?php echo e($benefit->title); ?>"
                                    class="transform transition duration-300 ease-in-out group-hover:scale-108 rounded-xl" />
                            <?php endif; ?>
                            <p class="text-2xl text-center text-green-600 pt-4 font-bold  mb-4">
                                <?php echo e($benefit->title); ?>

                            </p>
                            
                            <?php echo $benefit->short_description; ?>

                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

    <?php endif; ?>
    <!-- Benefit Section End -->


    <!-- start of pricing area devkamalhossen  -->
    
    <!-- end of pricing area devkamalhossen  -->

    <!-- usageAreas Start -->
    <?php if($data['service']?->usageAreas->count() > 0): ?>
        <section class="bg-white  py-12 md:py-20 lg:py-24">
            <div class="container">
                <h3
                    class="text-2xl mb-12 md:text-3xl lg:text-4xl text-center uppercase font-bold tracking-widest lg:tracking-[10px]">
                    Usage Of Areas
                </h3>

                <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-4">
                    <?php $__currentLoopData = $data['service']?->usageAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                            class="group flex flex-col lg:flex-row items-start gap-6 border border-black/20 rounded-lg bg-white p-6">

                            <?php if($usage->image): ?>
                                <div class="w-full lg:w-60 aspect-square flex-shrink-0">
                                    <img loading="lazy" src="<?php echo e(asset($usage->image)); ?>" alt="<?php echo e($usage->title); ?>"
                                        class="w-full h-full object-cover transform transition duration-300 ease-in-out group-hover:scale-108 rounded-xl" />
                                </div>
                            <?php endif; ?>

                            <div class="min-w-0">
                                <h4 class="text-3xl font-semibold text-green-600 break-words  mb-4"><?php echo e($usage->title); ?>

                                </h4>
                                
                                <?php echo $usage->short_description; ?>

                                
                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
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
            <h2 class="devkamal-gallery-title text-[22px] font-semibold text-gray-800">PROJECT GALLERY — BEFORE & AFTER</h2>
            
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
        
        <?php $__currentLoopData = $data['caseStudies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Case Study Item -->
        <div class="devkamal-cs-card">
            <div class="devkamal-cs-header"><?php echo e($item->header); ?></div>
            <div class="devkamal-cs-body">
                <h3><?php echo e($item->title); ?></h3>
                
                <div class="devkamal-details" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <span><strong>AREA:</strong> <?php echo e($item->area); ?> sq.ft</span>
                    <span><strong>INDUSTRY:</strong> <?php echo e($item->industry); ?></span>
                    <span><strong>SOLUTION:</strong> <?php echo e($item->solution); ?></span>
                    <span><strong>TIMELINE:</strong> <?php echo e($item->timeline); ?></span>
                </div>

                <div class="devkamal-outcome" style="margin-top: 15px;">
                    <strong>Outcome:</strong> <?php echo e($item->outcome); ?>

                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                <h2>Get the Free <?php echo e($data['service']?->title); ?> Cost Calculator (PDF)</h2>
                <p>Estimate your project cost in minutes — enter your area and application, and the calculator walks you through expected PU flooring pricing tiers for Bangladesh sites.</p>
                </div>
                
                <form class="devkamal-download-form">
                <input type="email" placeholder="Your work email" required>
                <button type="submit">Download PDF</button>
                </form>
            </div>
        </section>

    <!-- end of three section from here devkamalhossen  -->



    
    <?php if($data['service']?->faqs->count() > 0): ?>
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
                    <?php $__currentLoopData = $data['service']?->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="faq-item border border-black/20 rounded-lg overflow-hidden">

                            <button
                                class="faq-question w-full flex justify-between items-center p-5 text-left cursor-pointer bg-primary/10 hover:bg-primary/50 transition">

                                <span class="text-[22px] font-semibold text-gray-800">
                                    <?php echo e($faq->title); ?>

                                </span>

                                <svg class="faq-icon w-5 h-5 transition-transform" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>

                            </button>

                            <div class="faq-answer hidden p-5 text-black bg-gray-50 lg:text-[22px] text-[18px]">
                                <?php echo $faq->description; ?>

                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
        </section>
    <?php endif; ?>


     <!-- start of contact section from here devkamalhossen  -->
    <section class="devkamal-contact-main-wrapper">
        <div class="devkamal-info-bar">
            <div class="devkamal-info-text">
            <h4 class="text-[22px] font-semibold text-gray-800">Still have a question we haven't answered?</h4>
            <p>Get a straight answer on PU flooring cost, timeline, or suitability for your site — talk to our team directly.</p>
            </div>
            <div class="devkamal-info-btns">
            <a href="tel:01329742200" class="btn-call">Call Us</a>
            <a href="https://wa.me/+8801329742200" class="btn-whatsapp" target="_blank">WhatsApp</a>
            </div>
        </div>
        <div class="devkamal-form-section">
            <div class="devkamal-contact-details">
            <small class="text-[22px] font-semibold text-gray-800">PREFER TO TALK NOW?</small>
            <h2 style="margin-top: 15px" class="font-semibold">Reach Our Flooring Team Directly</h2>
            <p>Usually faster than the form — most calls get an answer the same day.</p>
            
            <div class="contact-box">Call us: 01329-742200</div>
            <div class="contact-box">WhatsApp: +880 1744-798865</div>
            </div>

            <div class="devkamal-inquiry-form">
            <h3 class="text-[22px] font-semibold text-gray-800">INTERESTED?</h3>
            <p style="margin-top: 15px">Get In Touch</p>
              <form id="contactForm" method="POST" class="space-y-6" action="<?php echo e(route('contact.form.submit')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="service_id" value="<?php echo e($data['service']->id); ?>">
                <input type="text" placeholder="Name" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="tel" placeholder="Phone Number" name="phone">
                <textarea placeholder="Message" name="message" required></textarea>
                   <button type="submit"
                    class="flex items-center space-x-3 hover:text-primary cursor-pointer group hover:scale-110 duration-300 hover:space-x-4 hover:translate-x-2">
                    <div
                        class="size-8 border border-dark rounded-full flex items-center justify-center relative z-[1] after:absolute after:left-0 after:top-1/2 after:-translate-y-1/2 after:w-0 after:h-0 after:bg-primary after:z-[-1] group-hover:after:h-full group-hover:after:w-full group-hover:text-white overflow-hidden after:rounded-full after:duration-300 group-hover:border-primary">
                        <?php echo config('icon.arrowRightLine'); ?>

                    </div>
                    <span class="font-semibold">SUBMIT</span>
                </button>
                <div id="formMessage" class="mt-4"></div>
            </form>
            </div>
        </div>
    </section>
    <!-- end of contact section from here devkamalhossen  -->

    

    <!-- More Service Section Start -->
    <?php if($data['moreServices']->count() > 0): ?>
        <section class="py-12 md:py-20 lg:py-24">
            <div class="container relative space-y-20">
                <h2 class="text-3xl md:text-4xl lg:text-5xl text-dark font-medium uppercase">
                    Explore More Service
                </h2>
                <div class="swiper moreServiceSwiper">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $data['moreServices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo e(route('service.detail', $service->slug)); ?>"
                                    class="group block cursor-pointer overflow-hidden relative aspect-square">
                                    <img loading="lazy" src="<?php echo e(asset($service->image)); ?>" alt="<?php echo e($service->title); ?>"
                                        class="size-full group-hover:scale-105 duration-300" />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent flex items-end p-10">
                                        <p class="md:text-2xl font-medium text-white">
                                            <?php echo e($service->title); ?>

                                        </p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="swiper-navigation flex items-center gap-5 mt-5">
                    <button
                        class="more-service-swiper-button-prev flex items-center justify-center rounded-full border border-black text-black text-2xl size-14 hover:bg-primary hover:text-white duration-300 transition-all hover:border-primary cursor-pointer">
                        <?php echo config('icon.longArrowLeft'); ?>

                    </button>
                    <button
                        class="more-service-swiper-button-next flex items-center justify-center rounded-full border border-black text-black text-2xl size-14 hover:bg-primary hover:text-white duration-300 transition-all hover:border-primary cursor-pointer">
                        <?php echo config('icon.longArrowRight'); ?>

                    </button>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- More Service Section End -->


    <?php $__env->startPush('styles'); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
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
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\falcon2026\resources\views/frontend/service-detail.blade.php ENDPATH**/ ?>
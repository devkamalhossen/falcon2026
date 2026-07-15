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

    <section class="bg-white  py-12 md:py-20 lg:py-24 bg-primary/10">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-10">
                <div class="space-y-4">
                    <h4 class="text-3xl md:text-4xl lg:text-5xl text-dark font-medium uppercase">
                        Interested?
                    </h4>
                    <h5 class="text-xl md:text-2xl lg:text-3xl uppercase text-dark font-medium">Get In touch</h5>
                </div>
                <form id="contactForm" method="POST" class="space-y-6" action="<?php echo e(route('contact.form.submit')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="service_id" value="<?php echo e($data['service']->id); ?>">
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
                                <?php echo config('icon.arrowRightLine'); ?>

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

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/service-detail.blade.php ENDPATH**/ ?>
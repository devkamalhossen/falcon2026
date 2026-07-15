<?php $__env->startSection('page_title', 'Epoxy & PU Flooring Services in Bangladesh'); ?>
<?php $__env->startSection('meta_data'); ?>
    <meta name="title" content="Epoxy & PU Flooring Services in Bangladesh" />
    <meta name="description" content="Falcon Solution Ltd provides premium industrial epoxy flooring, PU flooring, waterproofing, and construction chemical solutions across Bangladesh. Get a quote!" />
    <meta name="keywords" content="<?php echo e(get_option('meta_keywords')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <style>
        /* Basic slide setup */
        .featuredProject .swiper-slide {
            position: relative;
            overflow: hidden;
            /* prevent background overflow */
            z-index: 1;
        }

        .importerSlider .swiper-wrapper {
            transition-timing-function: linear !important;
        }

        /* Create a separate layer for background */
        .featuredProject .swiper-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transform: scale(1);
            transition: transform 7s ease-in-out;
            z-index: -1;
            /* keep it behind the text */
        }

        /* Copy your background image from inline style to the pseudo-element */
        .featuredProject .swiper-slide[style]::before {
            background-image: inherit;
        }

        /* Animate only the active slide's background */
        .featuredProject .swiper-slide-active::before {
            transform: scale(1.4);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>
    <!-- ===================== Hero Area Start ======================= -->
    <?php if($bannerSlider->count() > 0): ?>

        <section data-aos="fade-up">
            <div class="container relative z-[1] space-y-10 mt-10">
                <!-- Heading -->
                <h1
                    class=" text-2xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-black text-center tracking-[6px] sm:tracking-[12px] md:tracking-[20px] lg:tracking-[20px] font-normal uppercase">
                    <?php echo e(get_option('site_name')); ?>

                </h1>
                

                <!-- Slider Wrapper -->
                <div
                    class="h-[1000px] sm:h-[550px] md:h-[550px] lg:h-[600px] xl:h-[700px] relative bg-gray-100 overflow-hidden hero-img">
                    <!-- Swiper -->
                    <div class="swiper heroBannerSlider h-full relative">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $bannerSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <img loading="lazy" src="<?php echo e(asset($slider->image)); ?>" alt="<?php echo e($slider->alt_name); ?>"
                                        class="hero-img w-full h-full object-cover">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Overlay behind text -->
                        <div class="absolute inset-0 bg-black/40 z-10"></div>

                        <!-- Text content -->
                        <div
                            class="absolute inset-0 z-20 flex flex-col items-center justify-center text-white text-center w-4/5 mx-auto px-4 ">
                            
                            
                             <div data-aos="fade-up"
                                class="font-size:32px; text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl xl:leading-[1.2] font-bold [&_span]:text-secondary [&_br]:max-lg:hidden animate__animated animate__fadeInDown">
                                <?php echo e(get_option('site_banner_title')); ?>

                            </div>
                            
                            <h4 data-aos="fade-up"
                                class="md:text-lg mt-4 [&_br]:max-lg:hidden animate__animated animate__fadeInDown">
                                <?php echo e(get_option('site_banner_sub_title')); ?>

                            </h4>

                            <?php if($certficateBadges->count() > 0): ?>
                                <div
                                    class="my-6 flex items-center justify-center flex-wrap gap-2.5 animate__animated animate__fadeIn">
                                    <?php $__currentLoopData = $certficateBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img loading="lazy" class="max-w-sm" src="<?php echo e(asset($badge->image)); ?>"
                                            alt="Falcon Solution Limited">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            <?php endif; ?>
                            <div class="my-6 flex items-center justify-center flex-col sm:flex-row ">
                                <!-- Call Button -->
                                <a href="tel:<?php echo e(get_option('hotline')); ?>"
                                    class="flex items-center bg-black text-white font-bold px-6 py-3 rounded-l-full">
                                    <?php echo config('icons.phone'); ?>

                                    <span class="ml-2">CALL <?php echo e(get_option('hotline')); ?></span>
                                </a>

                                <!-- OR circle -->
                                <div
                                    class="flex items-center justify-center bg-white text-black font-bold w-8 h-8 rounded-full -mx-2 z-10 text-sm">
                                    OR
                                </div>

                                <!-- Quote Button -->
                                <a href="<?php echo e(route('contact')); ?>"
                                    class="bg-green-400 text-black font-bold px-6 py-3 rounded-r-full">
                                    GET AN ESTIMATE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <!-- ===================== Hero Area End ======================= -->

    <!-- ===================== About Us Start ======================= -->
    <section class="py-20 mt-10" data-aos="fade-up">
        <div class="container">
            <div class="flex flex-col xl:flex-row items-center gap-8">
                <div>
                    <h2 class="text-xl md:text-xl lg:text-2xl xl:text-3xl text-dark font-bold uppercase mb-10 lg:mb-6">
                        <?php echo e($homeIntro?->title); ?>

                    </h2>
                    <p class="text-[20px]">
                        <?php echo $homeIntro?->description; ?>

                    </p>

                    <a href="<?php echo e(route('our-story')); ?>"
                        class="mt-10 flex items-center space-x-3 hover:text-primary cursor-pointer group">
                        <div
                            class="size-8 border border-dark rounded-full flex items-center justify-center relative z-[1] after:absolute after:left-0 after:top-1/2 after:-translate-y-1/2 after:w-0 after:h-0 after:bg-primary after:z-[-1] group-hover:after:h-full group-hover:after:w-full group-hover:text-white overflow-hidden after:rounded-full after:duration-300 group-hover:border-primary">
                            <?php echo config('icon.arrowRightLine'); ?>

                        </div>
                        <span class="font-semibold">Know More</span>
                    </a>
                </div>

                <?php if($homeIntro?->video_id): ?>
                    <?php
                        // explode into array
                        $videoIds = $homeIntro?->video_id ? explode(',', $homeIntro->video_id) : [];
                        // pick a random video ID
                        $randomId = !empty($videoIds) ? $videoIds[array_rand($videoIds)] : null;
                    ?>


                    <?php if($randomId): ?>
                        <div class="relative inline-block max-w-xl w-full aspect-video shrink-0">
                            <a data-fslightbox="gallery" href="https://www.youtube.com/watch?v=<?php echo e($randomId); ?>">
                                <img loading="lazy" class="size-full object-cover"
                                    src="https://img.youtube.com/vi/<?php echo e($randomId); ?>/hqdefault.jpg"
                                    alt="Falcon Solution Limited" />

                                <!-- Play Icon Overlay -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="bg-red-600 text-white p-3 rounded-full shadow-lg cursor-pointer">
                                        <?php echo config('icon.play'); ?>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>


        </div>
    </section>
    <!-- ===================== About Us End ======================= -->



    <!-- ===================== Home Feature Video Start ======================= -->
    <?php if(get_option('home_feature_video')): ?>
        <section class="py-10 relative">
            <div class="container relative">
                <video id="videoTag" width="100%" muted autoplay>
                    <source src="<?php echo e(asset(get_option('home_feature_video'))); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <!-- Mute/Unmute Button -->
                <button id="muteButton"
                    class="absolute bottom-5 right-10 cursor-pointer bg-black/60 text-white px-4 py-2 rounded-full text-sm flex items-center gap-2">
                    🔇 Mute
                </button>
            </div>
        </section>
    <?php endif; ?>
    <!-- ===================== Home Feature Video Start ======================= -->

    <!-- ===================== Featured Projects Start ======================= -->
    <section class="relative">
        <div class="absolute z-[2] inset-x-0 top-24">
            <div class="container">
                <h3 class="uppercase text-white text-xl tracking-widest">Featured Projects</h3>
            </div>
        </div>
        <div class="h-[800px] relative">
            <div class="swiper featuredProject h-full">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $featuredProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-cover swiper-slide text-white relative z-[1] after:absolute after:inset-0 after:bg-black/60 after:z-[-1]"
                            style="background-image: url('<?php echo e(asset($slide->image)); ?>');">
                            <div class="container h-full flex flex-col justify-center">
                                <h4 class="text-xl uppercase tracking-wider">
                                    <?php echo e($slide->status == 1 ? 'Upcoming' : ($slide->status == 2 ? 'Ongoing' : 'Completed')); ?>

                                </h4>
                                <h2 class="text-4xl lg:text-5xl font-medium uppercase mt-4 mb-8"><?php echo e($slide->name); ?></h2>
                                <div class="h-20 flex items-center">
                                    <a href="<?php echo e(route('project-details', $slide->slug)); ?>"
                                        class="flex items-center gap-2.5 cursor-pointer group duration-300">
                                        <div
                                            class="size-3 bg-white overflow-hidden rounded-full relative group-hover:size-10 duration-300 transition-all">
                                            <span
                                                class="absolute text-black -left-[calc(100%_+_4px)] top-1/2 -translate-y-1/2 group-hover:left-1/2 group-hover:-translate-x-1/2 duration-300 transition-all">
                                                <?php echo config('icon.arrowRightLine'); ?>

                                            </span>
                                        </div>
                                        <span class="mt-1 text-lg">View Project</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="absolute inset-x-0 bottom-10 lg:bottom-20 z-[10] ">
                    <div class="container relative h-28">
                        <!-- Custom Pagination -->
                        <div
                            class="swiper-pagination !left-5 !top-auto !absolute !right-auto !bottom-0 !flex !flex-row gap-2 [&_.swiper-pagination-bullet]:!h-1 [&_.swiper-pagination-bullet]:!opacity-50 [&_.swiper-pagination-bullet]:!w-5 [&_.swiper-pagination-bullet]:!rounded-none [&_.swiper-pagination-bullet]:!bg-white [&_.swiper-pagination-bullet-active]:!w-8 [&_.swiper-pagination-bullet-active]:!opacity-100">
                        </div>

                        <!-- Custom Navigation -->
                        <div class="absolute top-0 text-white flex items-center gap-10 text-5xl">
                            <div class="prev-project cursor-pointer">
                                <?php echo config('icon.longArrowLeft'); ?>

                            </div>
                            <div class="next-project cursor-pointer">
                                <?php echo config('icon.longArrowRight'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute right-1 bottom-44 lg:bottom-20 lg:right-0 lg:left-0 z-[10] pointer-events-none">
                <div class="container">
                    <div class="swiper featuredProjectThumbs max-w-44 sm:max-w-52 md:max-w-md !ml-auto !mr-0 ">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $featuredProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="aspect-[5/3]">
                                        <?php if($slide->video): ?>
                                            <video src="<?php echo e(asset($slide->video)); ?>" autoplay muted loop playsinline
                                                preload="metadata" class="h-full w-full object-cover"></video>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Featured Projects End ======================= -->

    <!-- ==================== Achievement section start ==================== -->
    <section class="relative py-16 lg:py-24 overflow-hidden"
        style="background-image: url('<?php echo e(asset('frontend/assets/images/achievement-bg.jpeg')); ?>'); background-size: cover;background-position: center;">
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative container lg:max-w-7xl">
            <h3 class="text-3xl md:text-4xl lg:text-5xl font-bold text-center capitalize mb-12 text-white">
                <?php echo e($achievementData['achievementData']?->title); ?>

            </h3>
            <p class="mt-4 mb-12 text-2xl text-justify w-full text-white">
                <?php echo e($achievementData['achievementData']?->description); ?>

            </p>

            <?php
                $achievements = $achievementData['achievements'];
                $half = ceil($achievements->count() / 2);
            ?>

            <div class="grid grid-cols-1 lg:grid-cols-3  items-center">
                <!-- Left Column Stats -->
                <div class="space-y-40  text-center">
                    <?php $__currentLoopData = $achievements->take($half); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div data-aos="fade-up">
                            <span class="block text-6xl font-bold text-primary counter">
                                <?php echo e($achievement->numbers); ?>

                            </span>
                            <span class="text-xl tracking-wider uppercase font-bold text-white">
                                <?php echo e($achievement->title); ?>

                            </span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Center Image -->
                <div class="flex justify-center">
                    <div class="swiper achievementSlider">
                        <div class="swiper-wrapper">

                            <?php $__currentLoopData = $achievementData['sliders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <img loading="lazy" src="<?php echo e(asset($item->image)); ?>" class="w-full rounded-xl h-auto"
                                        alt="Falcon Solution Limited">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>

                <!-- Right Column Stats -->
                <div class="space-y-40 text-center">
                    <?php $__currentLoopData = $achievements->slice($half); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <span class="block text-6xl font-bold text-primary counter">
                                <?php echo e($achievement->numbers); ?>

                            </span>
                            <span class="text-xl tracking-wider uppercase font-bold text-white">
                                <?php echo e($achievement->title); ?>

                            </span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>

        </div>
    </section>
    <!-- ==================== Achievement section end ==================== -->

    <!-- ==================== Google Review section start ==================== -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="container">

            <h3 class="text-center text-3xl md:text-4xl lg:text-5xl font-medium capitalize">
                See what our customer's say!
            </h3>
            <div class="flex items-center justify-between gap-3 mb-10 mt-10 py-4 flex-wrap">
                <div class="">
                    <div class="flex items-center gap-4 mb-2">
                        <img loading="lazy" class="h-10 w-auto"
                            src="<?php echo e(asset('frontend/assets/images/google-logo.png')); ?>" alt="Falcon Solution Limited">
                        <p class="font-bold text-dark text-xl">Review</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <p class="font-bold text-dark">
                            <?php echo e(number_format($googleReviews['avg_rating'], 1)); ?>

                        </p>
                        <div class="text-amber-500 flex items-center gap-[2px] text-xl">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= floor($googleReviews['avg_rating'])): ?>
                                    <?php echo config('icon.star'); ?>

                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <div>
                    <a target="_blank" class="text-white bg-blue-500 py-3 px-7 rounded whitespace-nowrap inline-block"
                        href="https://search.google.com/local/writereview?placeid=ChIJHSm_yurBVTcR1g37ZI3IVWA">Review us on
                        Google</a>
                </div>
            </div>
            <div class="swiper googleReviewSwiper">
                <div class="swiper-wrapper pb-2">
                    <?php $__currentLoopData = $googleReviews['reviews']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="bg-white shadow-lg rounded-2xl p-5 space-y-3 min-h-70">
                                <!-- User Info -->
                                <div class="flex items-center space-x-3">
                                    <?php echo userAvatar($review->image, $review->name); ?>

                                    <div>
                                        <div class="flex items-center space-x-1">
                                            <h3 class="font-semibold text-gray-800"><?php echo e($review->name); ?></h3>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 2a10 10 0 1010 10A10.01142 10.01142 0 0012 2zm-1 15l-5-5 1.41-1.41L11 14.17l7.59-7.59L20 8z" />
                                            </svg>
                                        </div>
                                        <p class="text-sm text-gray-500">
                                            <?php echo e(\Carbon\Carbon::parse($review->review_date)->diffForHumans()); ?>

                                        </p>
                                    </div>
                                </div>

                                <!-- Rating -->
                                <div class="text-amber-500 flex items-center gap-[2px] text-xl">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= floor($review->rating)): ?>
                                            <?php echo config('icon.star'); ?>

                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                <div class="review">
                                    <p class="review-text text-gray-700 text-xl text-left">
                                        <?php echo nl2br(e($review->review)); ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="swiper-navigation flex items-center justify-center gap-7 md:gap-10">
                <button
                    class="more-google-review-swiper-button-prev text-black text-3xl md:text-4xl lg:text-5xl hover:text-primary duration-300 transition-all cursor-pointer">
                    <?php echo config('icon.longArrowLeft'); ?>

                </button>
                <button
                    class="more-google-review-swiper-button-next text-black text-3xl md:text-4xl lg:text-5xl hover:text-primary duration-300 transition-all cursor-pointer">
                    <?php echo config('icon.longArrowRight'); ?>

                </button>
            </div>
        </div>
    </section>
    <!-- ==================== Google Review section end ==================== -->

    <section class="py-12 md:py-20 lg:py-24 z-[1]">
        <div class="relative">
            <div class="container mb-20">
                <h2
                    class="text-3xl text-center md:text-4xl lg:text-5xl xl:text-6xl text-dark font-medium uppercase mb-10 lg:mb-6">
                    Explore
                </h2>
                <p class="text-[24px] text-center">
                    <?php echo e($latestServices['servicePage']?->section_description); ?>

                </p>
            </div>
            <div class="swiper exploreSwiper">
                <div class="swiper-wrapper pb-8 md:pb-12 lg:pb-20">
                    <?php $__currentLoopData = $latestServices['latestServices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                            class="swiper-slide !w-[250px] sm:!w-[350px] md:!w-[450px] lg:!w-[800px] [&_.explore-title]:hidden [&.swiper-slide-active_.explore-title]:block">
                            <a href="<?php echo e(route('service.detail', $service->slug)); ?>"
                                class="group block cursor-pointer relative aspect-video z-[2]">
                                <?php if($service->video): ?>
                                    <video src="<?php echo e($service->video); ?>" autoplay muted loop playsinline preload="metadata"
                                        class="size-full"></video>
                                <?php elseif(!$service->video && $service->image): ?>
                                    <img loading="lazy" src="<?php echo e(asset($service->image)); ?>" alt="<?php echo e($service->title); ?>"
                                        class="size-full transform transition duration-300 ease-in-out group-hover:scale-110" />
                                <?php endif; ?>
                                <div
                                    class="explore-title absolute w-full lg:max-w-[80%] left-1/2 -translate-x-1/2 bottom-0 translate-y-1/2 z-[-2]">
                                    <h3
                                        class="text-center text-xl sm:text-2xl md:text-3xl lg:text-4xl text-black font-bold uppercase">
                                        <?php echo e($service->title); ?>

                                    </h3>
                                </div>
                                <div
                                    class="explore-title text-shadow-md absolute w-full lg:max-w-[80%] left-1/2 -translate-x-1/2 bottom-0 translate-y-1/2">
                                    <h3
                                        class="text-center text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold uppercase stroke-text ![-webkit-text-stroke:1px_white] !whitespace-normal right-0 !relative">
                                        <?php echo e($service->title); ?>

                                    </h3>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="swiper-navigation flex items-center justify-center gap-7 md:gap-10 mt-5">
                <button
                    class="more-service-swiper-button-prev text-black text-3xl md:text-4xl lg:text-5xl hover:text-primary duration-300 transition-all cursor-pointer">
                    <?php echo config('icon.longArrowLeft'); ?>

                </button>
                <button
                    class="more-service-swiper-button-next text-black text-3xl md:text-4xl lg:text-5xl hover:text-primary duration-300 transition-all cursor-pointer">
                    <?php echo config('icon.longArrowRight'); ?>

                </button>
            </div>
        </div>
    </section>
    <!-- ==================== Services section end ==================== -->

    <section class="py-12 md:py-20 lg:py-24 bg-white">
        <div class="container">
            <div class="mb-20">
                <h2
                    class="text-3xl text-center md:text-4xl lg:text-5xl xl:text-6xl text-dark font-medium uppercase mb-10 lg:mb-6">
                    <?php echo e($homeCategoryIntro?->title); ?>

                </h2>
                <p class="text-[24px] text-center">
                    <?php echo e($homeCategoryIntro?->description); ?>

                </p>
            </div>
            <?php if($homeCategoryContent->count() > 0): ?>
                <!-- Vertical Tabs -->
                <div class="md:flex">
                    <!-- Tab List -->
                    <ul id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist"
                        class="flex-column text-sm font-medium text-dark">
                        <?php $__currentLoopData = $homeCategoryContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- Profile Tab -->
                            <li role="presentation">
                                <button id="profile-tab-<?php echo e($key); ?>"
                                    data-tabs-target="#profile-<?php echo e($key); ?>" type="button" role="tab"
                                    aria-controls="profile-<?php echo e($key); ?>"
                                    aria-selected="<?php echo e($key == 0 ? 'true' : 'false'); ?>"
                                    class="inline-flex items-center text-2xl !text-dark px-4 py-3 w-full cursor-pointer aria-selected:!bg-[#FFFAF4] aria-selected:!text-green-500 aria-selected:!border-l-green-500 aria-selected:border-l-4">

                                    <?php echo e($content->name); ?>

                                </button>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <!-- Tab Content -->
                    <div id="default-tab-content" class="flex-1">
                        <?php $__currentLoopData = $homeCategoryContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="hidden p-6 bg-[#FFFAF4] h-full " id="profile-<?php echo e($key); ?>"
                                role="tabpanel" aria-labelledby="profile-tab-<?php echo e($key); ?>">
                                <div class="flex flex-col items-start gap-6">
                                    <?php if($content->image): ?>
                                        <img loading="lazy"
                                            class="w-full rounded-lg overflow-hidden transform transition duration-300 ease-in-out hover:scale-105 shadow-lg shadow-gray-500 "
                                            src="<?php echo e(asset($content->image)); ?>" alt="<?php echo e($content->name); ?>">
                                    <?php endif; ?>
                                    <div class="w-full text-justify">
                                        <?php echo $content->description; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- ==================== Services Categories section end ==================== -->


    <!-- ==================== Businesses section end ==================== -->

    <?php if($businesses->count() > 0): ?>
        <section class="py-12 md:py-20 lg:py-24 z-[1]">
            <div class="container">

                <div class="relative">
                    
                    
                    
                    <div
                        class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-black font-medium uppercase animate__animated animate__fadeInLeft">
                        Our Businesses
                    </div>
                    <div
                        class="!z-[3] text-transparent [-webkit-text-stroke:1px_white] left-0 top-0 right-0 absolute text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase animate__animated animate__fadeInLeft">
                        Our Businesses
                    </div>
                    
                    
                </div>
                <div
                    class="relative swiper businessSwiper -translate-y-5 md:-translate-y-7 lg:-translate-y-10 xl:-translate-y-14">
                    <div class="swiper-wrapper pb-8 md:pb-12 lg:pb-20">
                        <?php $__currentLoopData = $businesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $business): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="swiper-slide !w-[350px] sm:!w-[350px] md:!w-[400px] lg:!w-[350px] [&_.explore-title]:hidden [&.swiper-slide-active_.explore-title]:block group relative overflow-hidden">

                                <div class="w-[450px] sm:!w-[350px] h-[500px] relative">
                                    <img loading="lazy" src="<?php echo e(asset($business?->thumbnail)); ?>"
                                        alt="<?php echo e($business?->name); ?>"
                                        class="w-full h-full group-hover:transform transition duration-300 ease-in-out hover:scale-110  object-fit">

                                    <div class="py-6 px-5 bg-black/60 absolute inset-x-0 bottom-0">
                                        <h3 class="text-lg tracking-wider uppercase font-semibold text-white">
                                            <?php echo e($business?->name); ?></h3>
                                    </div>
                                </div>
                                <div
                                    class="bg-black/60 text-left text-[#fffaf4] flex flex-col gap-3 justify-center items-start text-base absolute inset-0 px-5 py-6 translate-y-full transition-all duration-700 ease-[cubic-bezier(0.72,0.2,0.16,1)] z-[2] group-hover:translate-y-0">
                                    <h3 class="text-2xl tracking-wider uppercase font-semibold text-white">
                                        <?php echo e($business?->name); ?>

                                    </h3>
                                    <?php $__currentLoopData = $business?->businesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="flex items-center gap-1 text-xl hover:text-primary hover:underline"
                                            href="<?php echo e($busi->link); ?>"><?php echo e($busi->name); ?> <span class="text-primary">
                                                <?php echo config('icon.upRight'); ?></span></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="swiper-navigation flex items-start justify-start gap-7 md:gap-10 mt-5">
                    <button
                        class="business-swiper-button-prev text-black text-3xl md:text-4xl lg:text-5xl hover:text-primary duration-300 transition-all cursor-pointer">
                        <?php echo config('icon.longArrowLeft'); ?>

                    </button>
                    <button
                        class="business-swiper-button-next text-black text-3xl md:text-4xl lg:text-5xl hover:text-primary duration-300 transition-all cursor-pointer">
                        <?php echo config('icon.longArrowRight'); ?>

                    </button>
                </div>

            </div>
        </section>
    <?php endif; ?>
    <!-- ==================== Businesses section end ==================== -->

    <?php if($importers->count() > 0): ?>
        <section class="py-12 md:py-20 lg:py-24">
            <div class="container">
                <h2
                    class="text-3xl text-center md:text-4xl lg:text-4xl xl:text-5xl text-dark font-medium uppercase mb-10 lg:mb-20">
                    We import and purchase products from this country
                </h2>

                <div class="swiper importerSlider">

                    <div class="swiper-wrapper">

                        <?php $__currentLoopData = $importers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $importer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">

                                <div class="group relative overflow-hidden">
                                    <div class="aspect-[519/380] relative">

                                        <img loading="lazy" src="<?php echo e(asset($importer->image)); ?>"
                                            class="size-full object-cover transform transition duration-300 ease-in-out group-hover:scale-110"
                                            alt="Falcon Solution Limited">

                                        <div class="py-2 px-2 bg-black/60 absolute inset-x-0 bottom-0">
                                            <h3
                                                class="lg:text-lg text-base tracking-wider uppercase font-semibold text-white">
                                                <?php echo e($importer->name); ?>

                                            </h3>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>

            </div>
        </section>
    <?php endif; ?>

    <!-- ===================== CTA Section Start ======================= -->
    <section class="overflow-hidden bg-white">
        <div class="container relative z-[1]">
            <div class="grid gap-8 lg:gap-16 items-center ">
                <div class="space-y-8 py-12 lg:py-20 xl:py-24">
                    <div class="relative">
                        <h2 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-black font-medium uppercase">
                            Let's Connect
                        </h2>
                        <h2 class="stroke-text text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-medium uppercase">
                            Let's Connect
                        </h2>
                    </div>

                    <div
                        class="relative md:absolute md:right-0 md:h-full md:top-0 md:bottom-0 md:w-[55%] z-[2] max-sm:h-[250px] max-md:h-[350px]">
                        <img loading="lazy" src="<?php echo e(asset('frontend/assets/images/cta.avif')); ?>"
                            alt="Falcon Solution Limited" class="w-full h-full object-cover">
                    </div>

                    <div class="space-y-5 md:w-[35%]">
                        <div class="group cursor-pointer">
                            <div class="flex items-center justify-between border-b border-gray-700 pb-4">
                                <div>
                                    <h3 class="text-lg md:text-xl font-medium text-primary mb-2">
                                        Let's Talk
                                    </h3>
                                    <p class="text-2xl text-dark">
                                        We genuinely care about our customers; our intention is to provide the highest level
                                        of service and the highest quality products and the best ever technical support in
                                        the industry.
                                    </p>
                                </div>
                                <div class="ml-4">
                                    <span
                                        class="text-primary text-xl group-hover:translate-x-2 transition-transform duration-300">
                                        <a href="<?php echo e(route('contact')); ?>"> <?php echo config('icon.upRight'); ?></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== CTA Section End ======================= -->

    <div class="py-10">
        <div class="container">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-12 lg:gap-14">
                <div>
                    <div class="pb-2 border-b border-black/10 mb-3">
                        <h3 class="text-2xl font-semibold text-primary">Quick Links</h3>
                    </div>
                    <ul class="flex-col flex gap-1.5 pt-3">

                        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2 text-[18px]">
                            <?php echo config('icon.chevronRight'); ?>

                            Home
                        </a>
                        <a href="<?php echo e(route('our-story')); ?>" class="flex items-center gap-2 text-[18px]">
                            <?php echo config('icon.chevronRight'); ?>

                            Our Story
                        </a>
                        <a href="<?php echo e(route('our-clients')); ?>" class="flex items-center gap-2 text-[18px]">
                            <?php echo config('icon.chevronRight'); ?>

                            Our Clients
                        </a>
                        <a href="<?php echo e(route('services')); ?>" class="flex items-center gap-2 text-[18px]">
                            <?php echo config('icon.chevronRight'); ?>

                            Services
                        </a>
                        <a href="<?php echo e(route('product-list')); ?>" class="flex items-center gap-2 text-[18px]">
                            <?php echo config('icon.chevronRight'); ?>

                            Product List
                        </a>

                        <a href="<?php echo e(route('blogs')); ?>" class="flex items-center gap-2 text-[18px]">
                            <?php echo config('icon.chevronRight'); ?>

                            Blog
                        </a>
                        <?php
                            $pages = get_active_custom_pages();

                        ?>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('page', $page->slug)); ?>" class="flex items-center gap-2 text-[18px]">
                                <?php echo config('icon.chevronRight'); ?>

                                <?php echo e($page->name); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>
                <div>
                    <div class="pb-2 border-b border-black/10 mb-3">
                        <h3 class="text-2xl font-semibold text-primary">Trending Services</h3>
                    </div>
                    <ul class="flex-col flex gap-1.5 pt-3">
                        <?php
                            $services = get_active_services();
                        ?>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('service.detail', $service->slug)); ?>"
                                class="flex items-center gap-2 text-[18px]">
                                <?php echo config('icon.chevronRight'); ?>

                                <?php echo e($service->title); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>
                <div>
                    <div class="pb-2 border-b border-black/10 mb-3">
                        <h3 class="text-2xl font-semibold text-primary">Some of Projects</h3>
                    </div>
                    <ul class="flex-col flex gap-1.5 pt-3">
                        <?php
                            $projects = get_active_projects();
                        ?>
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('project-details', $project->slug)); ?>"
                                class="flex items-center gap-2 text-[18px]">
                                <?php echo config('icon.chevronRight'); ?>

                                <?php echo e($project->name); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <?php $__env->startPush('styles'); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script>
            new Swiper(".heroBannerSlider", {
                effect: "fade",
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".next-project",
                    prevEl: ".prev-project",
                },
                fadeEffect: {
                    crossFade: true,
                },
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },

                speed: 800,
            });

            const featuredProjectThumbs = new Swiper(".featuredProjectThumbs", {
                loop: true,
                effect: "fade",
            });

            const featuredProject = new Swiper(".featuredProject", {
                loop: true,
                effect: "fadeUp",
                direction: "vertical",
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".next-project",
                    prevEl: ".prev-project",
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                speed: 800,
                thumbs: {
                    swiper: featuredProjectThumbs,
                },
                on: {
                    slideChangeTransitionStart: function() {
                        const slides = document.querySelectorAll(".featuredProject .swiper-slide");
                        slides.forEach(slide => {
                            slide.classList.remove("fade-up-active", "fade-up-prev");
                        });

                        const activeSlide = this.slides[this.activeIndex];
                        const prevSlide = this.slides[this.previousIndex];

                        if (prevSlide) prevSlide.classList.add("fade-up-prev");
                        if (activeSlide) activeSlide.classList.add("fade-up-active");
                    },
                },
            });



            new Swiper(".importerSlider", {

                loop: true,
                grabCursor: true,

                spaceBetween: 20,
                speed: 4000,

                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                },

                breakpoints: {

                    0: {
                        slidesPerView: 3,
                        spaceBetween: 10
                    },

                    640: {
                        slidesPerView: 3,
                        spaceBetween: 15
                    },

                    768: {
                        slidesPerView: 4,
                        spaceBetween: 20
                    },

                    1024: {
                        slidesPerView: 6,
                        spaceBetween: 30
                    },

                    1280: {
                        slidesPerView: 8,
                        spaceBetween: 50
                    }

                }

            });


            new Swiper(".exploreSwiper", {
                effect: "coverflow",
                grabCursor: true,
                loop: true,
                centeredSlides: true,
                slidesPerView: "auto",
                spaceBetween: 50,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.more-service-swiper-button-next',
                    prevEl: '.more-service-swiper-button-prev',
                },
            });
            new Swiper(".businessSwiper", {
                grabCursor: true,
                loop: true,
                spaceBetween: 20, // default gap
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },

                speed: 800,
                navigation: {
                    nextEl: '.business-swiper-button-next',
                    prevEl: '.business-swiper-button-prev',
                },
                breakpoints: {
                    320: { // mobile
                        slidesPerView: 1,
                        spaceBetween: 15,
                    },
                    640: { // small tablets
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: { // tablets / small laptops
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1280: { // desktops
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                }
            });

            new Swiper(".googleReviewSwiper", {
                grabCursor: true,
                loop: true,
                spaceBetween: 20, // default gap
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },

                speed: 800,
                navigation: {
                    nextEl: '.more-google-review-swiper-button-next',
                    prevEl: '.more-google-review-swiper-button-prev',
                },
                breakpoints: {
                    320: { // mobile
                        slidesPerView: 1,
                        spaceBetween: 15,
                    },
                    640: { // small tablets
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: { // tablets / small laptops
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1280: { // desktops
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                }
            });

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
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('frontend/assets/plugins/lightbox.js')); ?>"></script>


        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const WORD_LIMIT = 25;

                document.querySelectorAll('.review-text').forEach(p => {
                    const fullText = p.innerHTML;
                    const temp = document.createElement('div');
                    temp.innerHTML = fullText;
                    const plain = temp.textContent || temp.innerText || '';

                    const words = plain.trim().split(/\s+/);
                    if (words.length <= WORD_LIMIT) return;


                    const truncatedPlain = words.slice(0, WORD_LIMIT).join(' ') + '…';
                    const truncatedHtml = truncatedPlain.replace(/\n/g, '<br>');


                    p.innerHTML = `
                                <span class="review-short">${truncatedHtml}</span>
                                <span class="review-full" style="display:none;">${fullText}</span>
                                <button type="button" class="review-toggle" aria-expanded="false" style="background:none;border:0;color:#0b5fff;cursor:pointer;padding-left:.25rem;">
                                    Read more
                                </button>
                                `;

                    const toggleBtn = p.querySelector('.review-toggle');
                    const shortSpan = p.querySelector('.review-short');
                    const fullSpan = p.querySelector('.review-full');

                    toggleBtn.addEventListener('click', () => {
                        const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
                        if (isExpanded) {
                            // collapse
                            fullSpan.style.display = 'none';
                            shortSpan.style.display = '';
                            toggleBtn.textContent = 'Read more';
                            toggleBtn.setAttribute('aria-expanded', 'false');
                        } else {
                            // expand
                            fullSpan.style.display = '';
                            shortSpan.style.display = 'none';
                            toggleBtn.textContent = 'Read less';
                            toggleBtn.setAttribute('aria-expanded', 'true');
                        }
                    });
                });
            });
        </script>

        <script>
            const video = document.getElementById('videoTag');
            const muteButton = document.getElementById('muteButton');

            muteButton.addEventListener('click', () => {
                video.muted = !video.muted;
                muteButton.innerHTML = video.muted ? '🔇 Mute' : '🔊 Unmute';
            });
        </script>

        <script>
            window.addEventListener("scroll", function() {
                const images = document.querySelectorAll(".hero-img");

                let scrollY = window.scrollY;

                images.forEach((img) => {
                    let scale = 1 + scrollY * 0.0005; // adjust speed here
                    if (scale > 1.2) scale = 1.2; // max zoom limit
                    img.style.transform = `scale(${scale})`;
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/home.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page_title', $data?->area_name); ?>
<?php $__env->startSection('meta_data'); ?>
    <meta name="title" content="<?php echo e($data?->meta_title); ?>" />
    <meta name="description" content="<?php echo e($data?->meta_description); ?>" />
    <meta name="keywords" content="<?php echo e($data?->meta_keywords); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <!-- Team Banner Section -->
 
     <section class="overflow-hidden ">
        <div class=" relative z-[-1]">
            <div class="relative text-center">
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-black font-medium uppercase animate__animated animate__fadeInUp">
                    <?php echo e($data?->area_name); ?>

                </h1>
                <h1
                    class="!z-[3] text-transparent [-webkit-text-stroke:1px_white] left-0 top-0 right-0 absolute text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase animate__animated animate__fadeInUp">
                    <?php echo e($data?->area_name); ?>

                </h1>
            </div>
            <div id="scroll-container"
                class="relative bg-gray-100 overflow-hidden w-[80%] mx-auto -translate-y-5 md:-translate-y-7 lg:-translate-y-10 xl:-translate-y-14 -mb-14 ">
                <div class="h-[250px] sm:h-[350px] md:h-[450px] lg:h-[600px] xl:h-[800px] relative overflow-hidden">
                    <?php if($data?->image): ?>
                        <img loading="lazy" src="<?php echo e(asset($data?->image)); ?>" alt="<?php echo e($data?->title); ?>"
                            id="scroll-zoom-img" class="w-full h-full object-cover absolute inset-0">
                    <?php else: ?>
                        <img loading="lazy" src="<?php echo e(asset('frontend/assets/images/contact-img.jpg')); ?>"
                            alt="<?php echo e($data?->title); ?>" id="scroll-zoom-img"
                            class="w-full h-full object-cover absolute inset-0">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Cards Section -->
    <section class="py-16 lg:py-24">
        <div class="container" data-aos="fade-up">
            <h3 class="text-2xl md:text-4xl lg:text-3xl font-bold mb-6 uppercase">
                <?php echo e($data?->title); ?>

            </h3>
            <?php echo $data?->description; ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/single-service-area.blade.php ENDPATH**/ ?>
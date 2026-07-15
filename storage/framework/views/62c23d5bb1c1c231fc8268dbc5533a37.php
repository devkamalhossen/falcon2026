<?php $__env->startSection('page_title', $data['pageData']?->title); ?>
<?php $__env->startSection('meta_data'); ?>
    <meta name="title" content="<?php echo e($data['pageData']?->meta_title); ?>" />
    <meta name="description" content="<?php echo e($data['pageData']?->meta_description); ?>" />
    <meta name="keywords" content="<?php echo e($data['pageData']?->meta_keywords); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <!-- Team Banner Section -->
    <section class="overflow-hidden">
        <div class=" relative z-[-1]">
            <div class="relative text-center">
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-black font-medium uppercase animate__animated animate__fadeInUp">
                    <?php echo e($data['pageData']?->title); ?>

                </h1>
                <h2
                    class="!z-[3] text-transparent [-webkit-text-stroke:1px_white] left-0 top-0 right-0 absolute text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase animate__animated animate__fadeInUp">
                    <?php echo e($data['pageData']?->title); ?>

                </h2>
            </div>
            <div id="scroll-container"
                class="relative bg-gray-100 overflow-hidden w-[80%] mx-auto -translate-y-5 md:-translate-y-7 lg:-translate-y-10 xl:-translate-y-14 -mb-14 ">
                <div class="h-[250px] sm:h-[350px] md:h-[450px] lg:h-[600px] xl:h-[800px] relative overflow-hidden">
                    <?php if($data['pageData']?->image): ?>
                        <img loading="lazy" src="<?php echo e(asset($data['pageData']?->image)); ?>"
                            alt="<?php echo e($data['pageData']?->title); ?>" id="scroll-zoom-img"
                            class="w-full h-full object-cover absolute inset-0">
                    <?php else: ?>
                        <img loading="lazy" src="<?php echo e(asset('frontend/assets/images/contact-img.jpg')); ?>"
                            alt="<?php echo e($data['pageData']?->title); ?>" id="scroll-zoom-img"
                            class="w-full h-full object-cover absolute inset-0">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Cards Section -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="container">
            <div class="text-center mb-12 space-y-2.5" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium uppercase">
                    <?php echo e($data['pageData']?->section_title); ?>

                </h2>
                <p class="text-lg">
                    <?php echo e($data['pageData']?->section_description); ?>

                </p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-12 gap-8">
                <?php $__currentLoopData = $data['why_choose']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $why): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="<?php echo e($index < 3 ? 'lg:col-span-4' : 'lg:col-span-6'); ?>">
                        <div class="bg-gray-100 rounded-2xl flex flex-col items-start py-5 px-5">

                            <!-- Image -->
                            <img loading="lazy" src="<?php echo e(asset($why?->image)); ?>" alt="<?php echo e($why?->title); ?>"
                                class="w-full rounded-2xl hover:scale-105 duration-300 transition-all">

                            <!-- Content -->
                            <div class="w-full lg:ml-auto">
                                <h3 class="text-2xl tracking-wider font-bold text-black mt-4">
                                    <?php echo e($why?->title); ?>

                                </h3>

                                <p><?php echo e($why?->short_description); ?></p>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
           

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/why-us.blade.php ENDPATH**/ ?>
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
                        <img loading="lazy" src="<?php echo e(asset($data['pageData']?->image)); ?>" alt="<?php echo e($data['pageData']?->title); ?>"
                            id="scroll-zoom-img" class="w-full h-full object-cover absolute inset-0">
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
    <section class="py-16 lg:py-24">
        <div class="container">

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-20" data-aos="fade-up">
                <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group relative overflow-hidden">
                        <div class="w-[400px] h-[500px] relative">
                            <img loading="lazy" src="<?php echo e(asset($category?->thumbnail)); ?>" alt="<?php echo e($category?->name); ?>"
                                class="w-full h-full  object-fit">

                            <div class="py-6 px-5 bg-black/60 absolute inset-x-0 bottom-0">
                                <h3 class="text-lg tracking-wider uppercase font-semibold text-white">
                                    <?php echo e($category?->name); ?></h3>
                            </div>
                        </div>
                        <div
                            class="bg-black/60 text-left text-[#fffaf4] flex flex-col gap-3 justify-center items-start text-base absolute inset-0 px-5 py-6 translate-y-full transition-all duration-700 ease-[cubic-bezier(0.72,0.2,0.16,1)] z-[2] group-hover:translate-y-0">
                            <h3 class="text-2xl tracking-wider uppercase font-semibold text-white"><?php echo e($category?->name); ?>

                            </h3>
                            <?php $__currentLoopData = $category?->businesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $business): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="flex items-center gap-1 text-xl hover:text-primary hover:underline"
                                    href="<?php echo e($business->link); ?>"><?php echo e($business->name); ?> <span class="text-primary">
                                        <?php echo config('icon.upRight'); ?></span></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/our-business.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page_title', $blog->title); ?>
<?php $__env->startSection('meta_data'); ?>
    <meta name="title" content="<?php echo e($blog?->meta_title); ?>" />
    <meta name="description" content="<?php echo e($blog?->meta_description); ?>" />
    <meta name="keywords" content="<?php echo e($blog?->meta_keywords); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <section class="py-12 md:py-20 lg:py-24">
        <div class="container relative space-y-3">
            <a href="<?php echo e(route('blogs')); ?>" class="flex items-center gap-2 text-lg">
                <?php echo config('icon.chevronLeft'); ?>

                Back
            </a>

            <p class="mt-8"><?php echo e($blog?->category?->name); ?></p>

            <h1 class="text-2xl md:text-3xl lg:text-4xl font-medium text-dark"><?php echo e($blog->title); ?></h1>

            <p> <?php echo e(date('d M Y', strtotime($blog->created_at))); ?></p>

            <hr class="border-t border-gray-200 my-8">

            <img  loading="lazy" src="<?php echo e(asset($blog->image)); ?>" class="w-full" alt="<?php echo e($blog->title); ?>">

            <div class="blog-content">
                <?php echo $blog->post_content; ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/single-blog.blade.php ENDPATH**/ ?>
<?php if($galleryCategories->count() > 0): ?>
    <?php $__currentLoopData = $galleryCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($category->galleries->count() > 0): ?>
            <div class="gallery-category-block">
                <span class="rounded-xl p-3 font-semibold bg-primary text-white">
                    <?php echo e($category->name); ?>

                </span>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12 lg:gap-14 mt-10 mb-10">
                    <?php $__currentLoopData = $category->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a data-fslightbox="gallery"
                            href="<?php echo e($row->type == 1 ? asset($row->image) : 'https://www.youtube.com/watch?v=' . $row->video_id); ?>"
                            class="gallery-item relative block overflow-hidden aspect-video">

                            <img loading="lazy" src="<?php echo e($row->type == 1 ? asset($row->image) : 'https://img.youtube.com/vi/' . $row->video_id . '/hqdefault.jpg'); ?>"
                                alt="Falcon Solution Limited"
                                class="size-full object-cover hover:scale-105 duration-300 rounded-xl" />

                            <?php if($row->type == 2): ?>
                                <div
                                    class="absolute pointer-events-none top-1/2 left-1/2 
                                                -translate-x-1/2 -translate-y-1/2 w-12 h-9 
                                                flex items-center justify-center text-2xl 
                                                bg-red-500 text-white rounded-t-lg rounded-b-lg">
                                    <?php echo config('icon.play'); ?>

                                </div>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/falconso/public_html/resources/views/frontend/includes/gallery-card.blade.php ENDPATH**/ ?>
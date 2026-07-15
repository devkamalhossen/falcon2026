<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('single.blog', $blog->slug)); ?>" class="group  cursor-pointer" data-aos="fade-up">
        <article
            style="translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
            <div class="relative">
                <div class="relative overflow-hidden z-[1] aspect-[507/285]">
                    <img loading="lazy" src="<?php echo e(asset($blog->image)); ?>" alt="<?php echo e($blog->title); ?>"
                        class="size-full group-hover:scale-105 duration-300 transition-all" />
                    <div
                        class="bg-[#3c3c3b4d] h-full left-0 top-0 w-full absolute group-hover:[transition:all_.3s_ease-in-out] group-hover:bg-[#3c3c3b66]">
                    </div>
                </div>

            </div>
            <div
                class="bg-white text-primary border rounded-full border-dark text-sm font-medium leading-[100%] p-[5px_10px] inline-block mt-4">
                <?php echo e($blog?->category?->name); ?></div>
            <h1 class="text-xl [margin-block:15px] font-bold text-dark">
                <?php echo e($blog->title); ?>

            </h1>
            <?php
                $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                $date = \Carbon\Carbon::parse($blog->created_at)->format('Y-d-m');
            ?>
            <p class="text"><?php echo e($day); ?>, <?php echo e($date); ?></p>

        </article>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/falconso/public_html/resources/views/frontend/includes/category-blog-card.blade.php ENDPATH**/ ?>
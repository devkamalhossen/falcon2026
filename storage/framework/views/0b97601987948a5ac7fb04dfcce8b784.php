<?php $__env->startSection('page_title', 'Our Blogs'); ?>
<?php $__env->startSection('meta_data'); ?>
    <meta name="title" content="Blog - Falcon Solution Blog" />
    <meta name="description"
        content="Read expert articles, industry insights, technical guides, and updates from Falcon Solution Limited on industrial flooring, epoxy coatings, waterproofing systems, and construction chemical solutions." />
    <meta name="keywords"
        content="Falcon Solution blog, construction chemicals blog, industrial flooring articles, epoxy flooring guide, waterproofing tips, concrete repair, protective coatings, construction industry news" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    
    <div class="lg:py-15 py-10 bg-primary/5">
        <div class="container">
            <div class="mb-10">
                <h1 class="lg:text-[60px] text-[48px] font-bold leading-[150%]">Blog</h1>
                <p class="text-2xl font-semibold">Latest articles and insights</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $data['blogs']->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <h2 class="text-xl [margin-block:15px] font-bold text-dark">
                                <?php echo e($blog->title); ?>

                            </h2>
                            <?php
                                $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                                $date = \Carbon\Carbon::parse($blog->created_at)->format('Y-M-d');
                            ?>
                            <p class="text"><?php echo e($day); ?>, <?php echo e($date); ?></p>

                        </article>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    
    <div class="lg:py-15 py-10 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-8">
                <div class="lg:col-span-4">
                    <?php $__currentLoopData = $data['blogs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('single.blog', $blog->slug)); ?>" class="group cursor-pointer" data-aos="fade-up">
                            <article class="flex flex-col lg:flex-row items-start gap-6 mb-8">
                                <div class="w-full lg:w-1/5">
                                    <div class="relative overflow-hidden aspect-[507/290]">
                                        <img loading="lazy" src="<?php echo e(asset($blog->image)); ?>" alt="<?php echo e($blog->title); ?>"
                                            class="w-full h-full object-cover transition-all duration-300 group-hover:scale-105" />
                                        <div
                                            class="bg-[#3c3c3b4d] absolute inset-0 group-hover:bg-[#3c3c3b66] transition-all duration-300">
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/5">
                                    <h2 class="text-xl mb-2 font-bold text-dark">
                                        <?php echo e($blog->title); ?>

                                    </h2>

                                    <div class="flex items-center gap-2 flex-wrap">
                                        <div
                                            class="bg-white text-primary border rounded-full border-dark text-sm font-medium p-[3px_10px] inline-block">
                                            <?php echo e($blog?->category?->name); ?>

                                        </div>
                                        <?php
                                            $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                                            $date = \Carbon\Carbon::parse($blog->created_at)->format('d m Y');
                                        ?>

                                        <p><?php echo e($day); ?>, <?php echo e($date); ?></p>
                                    </div>
                                    <div class="py-3">
                                        <p class="font-normal text-base text-black text-justify">
                                            <?php echo e(\Illuminate\Support\Str::limit($blog->blog_excerpt, 200)); ?>

                                        </p>
                                    </div>

                                </div>

                            </article>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="lg:col-span-2">
                    <h3 class="mb-5 text-2xl font-semibold">Most Popular </h3>

                    <?php $__currentLoopData = $data['mostPopulars']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('single.blog', $blog->slug)); ?>" class="group  cursor-pointer" data-aos="fade-up">
                            <article class="border-b border-gray-200 py-4"
                                style="translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                                <?php if($index == 0): ?>
                                    <div class="relative">
                                        <div class="relative overflow-hidden z-[1] aspect-[507/285]">
                                            <img loading="lazy" src="<?php echo e(asset($blog->image)); ?>" alt="<?php echo e($blog->title); ?>"
                                                class="size-full group-hover:scale-105 duration-300 transition-all" />
                                            <div
                                                class="bg-[#3c3c3b4d] h-full left-0 top-0 w-full absolute group-hover:[transition:all_.3s_ease-in-out] group-hover:bg-[#3c3c3b66]">
                                            </div>
                                        </div>

                                    </div>
                                <?php endif; ?>
                                <div
                                    class="bg-white text-primary border rounded-full border-dark text-sm font-medium leading-[100%] p-[5px_10px] inline-block mt-4">
                                    <?php echo e($blog?->category?->name); ?></div>
                                <h2 class="text-xl [margin-block:10px] font-bold text-dark">
                                    <?php echo e($blog->title); ?>

                                </h2>
                                <?php
                                    $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                                    $date = \Carbon\Carbon::parse($blog->created_at)->format('Y-d-M');
                                ?>
                                <p class="text"><?php echo e($day); ?>, <?php echo e($date); ?></p>

                            </article>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    
    <div class="lg:py-15 py-10 bg-gray-100">
        <div class="container">
            <?php $__currentLoopData = $data['categoryWiseBlogs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($category?->blogs->count() > 0): ?>
                    <div class="mb-12">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="text-2xl font-semibold"><?php echo e($category->name); ?> </h3>
                            <a href="<?php echo e(route('category.blog', $category->slug)); ?>"
                                class="text-primary text-lg font-semibold">View All</a>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                            <?php $__currentLoopData = $category?->blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('single.blog', $blog->slug)); ?>" class="group  cursor-pointer"
                                    data-aos="fade-up">
                                    <article
                                        style="translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                                        <div class="relative">
                                            <div class="relative overflow-hidden z-[1] aspect-[507/285]">
                                                <img loading="lazy" src="<?php echo e(asset($blog->image)); ?>"
                                                    alt="<?php echo e($blog->title); ?>"
                                                    class="size-full group-hover:scale-105 duration-300 transition-all" />
                                                <div
                                                    class="bg-[#3c3c3b4d] h-full left-0 top-0 w-full absolute group-hover:[transition:all_.3s_ease-in-out] group-hover:bg-[#3c3c3b66]">
                                                </div>
                                            </div>

                                        </div>
                                        <div
                                            class="bg-white text-primary border rounded-full border-dark text-sm font-medium leading-[100%] p-[5px_10px] inline-block mt-4">
                                            <?php echo e($blog?->category?->name); ?></div>
                                        <h2 class="text-xl [margin-block:15px] font-bold text-dark">
                                            <?php echo e($blog->title); ?>

                                        </h2>
                                        <?php
                                            $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                                            $date = \Carbon\Carbon::parse($blog->created_at)->format('Y-d-M');
                                        ?>
                                        <p class="text"><?php echo e($day); ?>, <?php echo e($date); ?></p>

                                    </article>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/blogs.blade.php ENDPATH**/ ?>
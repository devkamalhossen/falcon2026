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
            <div class="relative text-center mx-auto w-full sm:w-4/5 md:w-3/4 lg:w-2/3">
                <h1
                    class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-black font-medium uppercase animate__animated animate__fadeInUp">
                    <?php echo e($data['pageData']?->title); ?>

                </h1>
                <h2
                    class="!z-[3] text-transparent [-webkit-text-stroke:1px_gray] absolute inset-0 flex items-center justify-center text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-[96px] font-medium uppercase animate__animated animate__fadeInUp">
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
            <?php $__currentLoopData = $data['teams']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $teamType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($teamType->teams->count() > 0): ?>
                    <div class="text-center mb-12 mt-12" data-aos="fade-up">
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium uppercase">
                            <?php echo e($teamType->name); ?>

                        </h2>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-20">
                        <?php $__currentLoopData = $teamType->teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-4">
                                <div class="aspect-[562/704]">
                                    <img loading="lazy" src="<?php echo e(asset($team->image)); ?>" alt="image" class="size-full object-cover">
                                </div>
                                <div class="flex flex-col items-start">
                                    <h3 class="font-semibold mb-[15px] mt-3 text-2xl lg:text-3xl uppercase"><?php echo e($team->name); ?>

                                    </h3>
                                    <p class="text-lg text-primary uppercase mb-1"><?php echo e($team->designation); ?></p>
                                    <p class="text-md text-black mb-7"><?php echo e($team->educational_bg); ?></p>
                                    <div class="mb-7">
                                        <p class="line-clamp-4"><?php echo e(substr($team->bio, 0, 150)); ?></p>
                                    </div>
                                    <div class="flex items-center gap-2 group  hover:text-primary">
                                        <button data-content='<?php echo json_encode([
                                            'name' => $team->name,
                                            'designation' => $team->designation,
                                            'educational_bg' => $team->educational_bg,
                                            'bio' => $team->bio,
                                            'image' => asset($team->image),
                                        ]); ?>' data-modal-target="team-modal"
                                            data-modal-toggle="team-modal"
                                            class="cursor-pointer text-lg uppercase relative after:absolute after:inset-x-0 after:-bottom-0 after:h-px after:bg-dark  group-hover:after:bg-primary modal-btn">
                                            Show more
                                        </button>
                                        <?php echo config('icon.plus'); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </section>

    <!-- Team Cards Section -->
    <?php if($data['pageData']?->team_image): ?>
        <section class="pt-16 lg:pt-24 bg-[#ece5da]">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium uppercase" data-aos="fade-up">
                    Our Strength Team
                </h2>
            </div>

            <div class="h-[400px] sm:h-[500px] md:h-[600px] lg:h-[900px]" data-aos="fade-up">
                <img loading="lazy" src="<?php echo e(asset($data['pageData']?->team_image)); ?>" alt="Falcon Solution Limited" class="w-full h-full object-cover">
            </div>
        </section>
    <?php endif; ?>

    <!-- Team Modal Section -->
    <div id="team-modal" tabindex="-1" aria-hidden="true" class="hidden overflow fixed inset-0 z-50 bg-[#ebfbe4] ">
        <div class="grid md:grid-cols-[7fr_5fr] items-start w-screen h-screen max-md:overflow-y-auto">
            <div class="p-20">
                <button data-modal-hide="team-modal" type="button"
                    class="cursor-pointer size-14 flex items-center justify-center text-4xl border rounded-full duration-300 transition-all hover:rotate-180 hover:text-primary">
                    <?php echo config('icon.close'); ?>

                </button>
                <h2 class="text-3xl font-bold uppercase mt-10 mb-4" id="memberName"></h2>
                <p class="uppercase tracking-wider text-primary" id="memberDesignation"></p>
                <p class="uppercase tracking-wider text-md text-black" id="memberEducation"></p>
                <p class="text-lg text-dark mt-16 leading-[2]" id="memberBio">
                </p>
            </div>
            <div class="max-md:aspect-[562/704]">
                <img loading="lazy" id="memberImage" class="size-full bg-amber-100 object-cover" alt="Falcon Solution Limited" />
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.modal-btn').click(function() {
            var modal = $('#team-modal');
            var image = $('#memberImage');
            var name = $('#memberName');
            var designation = $('#memberDesignation');
            var educational_bg = $('#memberEducation');
            var bio = $('#memberBio');
            var content = $(this).data('content');
            name.text(content.name);
            designation.text(content.designation);
            educational_bg.text(content.educational_bg);
            bio.text(content.bio);
            image.attr('src', content.image);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/team.blade.php ENDPATH**/ ?>
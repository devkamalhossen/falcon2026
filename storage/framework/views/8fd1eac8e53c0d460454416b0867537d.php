<?php
    $address = get_option('address');
    $hotline = get_option('hotline');
    $phone = get_option('phone');
    $email = get_option('email');
?>



<footer class="bg-[#6a994e] py-8 text-white">
    <div class="container">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Contact Info -->
            <div class="space-y-1.5">
                <?php if($hotline): ?>
                    <a href="tel:<?php echo e($hotline); ?>" class="group text-xl flex gap-1.5">
                        <span class="group-hover:underline">
                            Hotline: <?php echo e($hotline); ?>

                        </span>
                        <span class="invisible group-hover:visible">
                            <?php echo config('icon.upRight'); ?>

                        </span>
                    </a>
                <?php endif; ?>

                <?php if($phone): ?>
                    <a href="tel:<?php echo e($phone); ?>" class="group text-xl flex gap-1.5">
                        <span class="group-hover:underline">
                            Phone: <?php echo e($phone); ?>

                        </span>
                        <span class="invisible group-hover:visible">
                            <?php echo config('icon.upRight'); ?>

                        </span>
                    </a>
                <?php endif; ?>

                <?php if($email): ?>
                    <a href="mailto:<?php echo e($email); ?>" class="group text-xl flex gap-1.5">
                        <span class="group-hover:underline">
                            Email: <?php echo e($email); ?>

                        </span>
                        <span class="invisible group-hover:visible">
                            <?php echo config('icon.upRight'); ?>

                        </span>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Logo & Copyright -->
            <div class="text-center space-y-3">
                <div>
                    <img  loading="lazy" src="<?php echo e(asset(get_option('site_logo'))); ?>" class="mx-auto max-h-20 mb-8" alt="Falcon Solution Limited">
                    
                    


                    <?php
                        $socialColors = [
                            'facebook'  => '#1877F2',
                            'instagram' => '#E4405F',
                            'twitter'   => '#1DA1F2',
                            'youtube'   => '#FF0000',
                            'linkedin'  => '#0A66C2',
                            'pinterest' => '#E60023',
                        ];
                    ?>
                    
                    <?php if($socials->count() > 0): ?>
                        <div class="flex gap-4 justify-center items-center mb-3">
                            <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($social->link); ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="size-12 rounded-full flex items-center justify-center transition-transform duration-300 hover:scale-110 text-white"
                                    style="background-color: <?php echo e($socialColors[$social->name] ?? '#6B7280'); ?>;">
                                    <span class="text-2xl">
                                        <?php echo config('icon.' . $social->name); ?>

                                    </span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>



                </div>
                <p class="text-[12px] mt-2 ">
                    © <?php echo e(date('Y')); ?>, <?php echo e(get_option('site_name')); ?> |
                    <?php echo e(get_option('copyright_text')); ?> |
                    developed by
                    <a href="https://www.linkedin.com/in/webdevifti/" class="underline">
                        webdevifti
                    </a>
                </p>
            </div>

            <!-- Address + Social -->
            <div class="space-y-4 lg:text-right">
                <?php if($address): ?>
                    <div>
                        <h4 class="font-medium">Address</h4>
                        <p class="text-xl leading-relaxed">
                            <?php echo e($address); ?>

                        </p>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</footer>
<?php /**PATH /home/falconso/public_html/resources/views/frontend/includes/footer.blade.php ENDPATH**/ ?>
<?php $__currentLoopData = $certifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div data-aos="fade-up">
        <img  loading="lazy" src="<?php echo e(asset($item?->image)); ?>"
            class="mx-auto w-full h-auto transition-all duration-500 ease-in-out transform hover:scale-105 hover:shadow-xl hover:-translate-y-1"
            alt="Falcon Solution Limited">
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/falconso/public_html/resources/views/frontend/includes/certificate-images.blade.php ENDPATH**/ ?>
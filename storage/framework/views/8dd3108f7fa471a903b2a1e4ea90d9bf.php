<?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div data-aos="fade-up">
        <img  loading="lazy" src="<?php echo e(asset($client?->image)); ?>" class="mx-auto w-full h-auto" alt="<?php echo e($client?->alt_name); ?>">
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/falconso/public_html/resources/views/frontend/includes/client-images.blade.php ENDPATH**/ ?>
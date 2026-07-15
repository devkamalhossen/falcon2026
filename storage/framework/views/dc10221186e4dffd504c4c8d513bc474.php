     <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="group block cursor-pointer relative service-box" data-aos="fade-up">
             <div class="relative overflow-hidden aspect-square">
                 <a href="<?php echo e(route('service.detail', $service->slug)); ?>">
                     <img  loading="lazy" src="<?php echo e(asset($service->image)); ?>" alt="<?php echo e($service->title); ?>"
                         class="size-full group-hover:scale-110 duration-300" />
                 </a>
             </div>
             <p class="border inline-block mt-4 rounded-full border-dark text-sm text-dark font-medium p-[3px_10px]">
                 <?php echo e($service?->category?->name); ?>

             </p>
             </a>
             <p class="text-xl pt-4 font-medium text-dark">
                 <a href="<?php echo e(route('service.detail', $service->slug)); ?>"> <?php echo e($service->title); ?></a>
             </p>


             <a href="<?php echo e(route('service.detail', $service->slug)); ?>"
                 class="detail-btn absolute opacity-0 invisible size-24 bg-primary/50 backdrop-blur-xs text-white flex items-center justify-center rounded-full text-sm">
                 View Details
             </a>
         </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/falconso/public_html/resources/views/frontend/includes/service-card.blade.php ENDPATH**/ ?>
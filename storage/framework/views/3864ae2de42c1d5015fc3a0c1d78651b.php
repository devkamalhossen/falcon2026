 <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <a href="<?php echo e(route('project-details', $project->slug)); ?>" class="group cursor-pointer relative project-box" data-aos="fade-up">
         <div class="relative overflow-hidden aspect-square">
             <img  loading="lazy" src="<?php echo e(asset($project->image)); ?>" alt="<?php echo e($project->name); ?>"
                 class="size-full group-hover:scale-105 duration-300" />
         </div>
         <p class="text-xl pt-5 font-medium text-dark">
             <?php echo e($project->name); ?>

         </p>
         <a href="<?php echo e(route('project-details', $project->slug)); ?>"
             class="detail-btn absolute opacity-0 invisible size-24 bg-primary/50 backdrop-blur-xs text-white flex items-center justify-center rounded-full text-sm">
             View Details
         </a>
     </a>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/falconso/public_html/resources/views/frontend/includes/project-card.blade.php ENDPATH**/ ?>
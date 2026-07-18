


<?php $__env->startSection('main'); ?> 
    <style>
        /* আপনার সিএসএস ঠিক আছে */
        .tag { background: #007bff; color: #fff; padding: 4px 10px; border-radius: 20px; margin: 3px; display: flex; align-items: center; font-size: 14px; }
        .tag .remove-tag { margin-left: 6px; cursor: pointer; font-weight: bold; }
    </style>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Case Study Intro</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Case Study</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           <form class="row g-2" action="<?php echo e(route('store_case_study')); ?>" id="caseStudyForm" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="col-4">
                                    <label for="header" class="form-label">Header (e.g., Garment Factory)</label>
                                    <input type="text" name="header" class="form-control" id="header" value="<?php echo e($pageData?->header); ?>">
                                </div>

                                <div class="col-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?php echo e($pageData?->title); ?>">
                                </div>

                                <div class="col-4">
                                    <label for="area" class="form-label">Area (sq.ft)</label>
                                    <input type="text" name="area" class="form-control" id="area" value="<?php echo e($pageData?->area); ?>">
                                </div>

                                <div class="col-4">
                                    <label for="industry" class="form-label">Industry</label>
                                    <input type="text" name="industry" class="form-control" id="industry" value="<?php echo e($pageData?->industry); ?>">
                                </div>

                                <div class="col-4">
                                    <label for="solution" class="form-label">Solution</label>
                                    <input type="text" name="solution" class="form-control" id="solution" value="<?php echo e($pageData?->solution); ?>">
                                </div>

                                <div class="col-4">
                                    <label for="timeline" class="form-label">Timeline</label>
                                    <input type="text" name="timeline" class="form-control" id="timeline" value="<?php echo e($pageData?->timeline); ?>">
                                </div>

                                <div class="col-12">
                                    <label for="outcome" class="form-label">Outcome</label>
                                    <textarea name="outcome" class="form-control" id="outcome" rows="3"><?php echo e($pageData?->outcome); ?></textarea>
                                </div>

                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary">Save Case Study</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table Section -->
       
        <section class="section mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Case Studies List</h5>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Header</th>
                                        <th>Title</th>
                                        <th>Industry</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $caseStudies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->header); ?></td>
                                        <td><?php echo e($item->title); ?></td>
                                        <td><?php echo e($item->industry); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('edit_case_study',$item->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?php echo e(route('delete_case_study',$item->id)); ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\falcon2026\resources\views/admin/casestudy/case-study.blade.php ENDPATH**/ ?>
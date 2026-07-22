<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('main'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-6 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Services</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo e($data['totalServices']); ?></h6>
                                            <span class="text-success small pt-1 fw-bold"><?php echo e($data['activeServices']); ?><span> <span
                                                        class="text-muted small pt-2 ps-1">Active</span>
                                                    <span
                                                        class="text-danger small pt-1 fw-bold"><?php echo e($data['inactiveServices']); ?></span>
                                                    <span class="text-muted small pt-2 ps-1">InActive</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->
                        <!-- Sales Card -->
                        <div class="col-xxl-6 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Projects</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo e($data['totalProjects']); ?></h6>
                                            <span class="text-success small pt-1 fw-bold"><?php echo e($data['activeProjects']); ?><span> <span
                                                        class="text-muted small pt-2 ps-1">Active</span>
                                                    <span
                                                        class="text-danger small pt-1 fw-bold"><?php echo e($data['inactiveProjects']); ?></span>
                                                    <span class="text-muted small pt-2 ps-1">InActive</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
            <div class="row">
                <div class="col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Most Viewed Blog</h6>
                        </div>
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th class="text-center">View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data['mostViewedBlogs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if($item->image): ?>
                                                    <img src="<?php echo e(asset($item->image)); ?>" class="rounded" alt=""
                                                        width="50">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('admin/assets/img/profile-placeholder.png')); ?>"
                                                        class="rounded" alt="" width="50">
                                                <?php endif; ?>

                                            </td>
                                            <td><?php echo e($item->title); ?></td>
                                            <td class="text-center"><?php echo e($item->view_count); ?></td>

                                            <td>
                                                <a target="_blank" href="<?php echo e(route('single.blog', $item->slug)); ?>"
                                                    class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6"></div>
            </div>
        </section>

    </main><!-- End #main -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\falcon2026\resources\views/admin/index.blade.php ENDPATH**/ ?>
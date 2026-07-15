
<?php $__env->startSection('title', 'Customer Messages'); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        .dropdown-menu li a {
            display: flex;
            align-items: center;
            padding: 5px !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Customer Messages Management</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Customer Messages</li>
                        <li class="breadcrumb-item active">Customer Messages</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Project ID</th>
                                        <th>Service ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Created By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td width='10%'>
                                                <?php echo e($item->project?->name); ?>

                                            </td>
                                            <td width='10%'>
                                                <?php echo e($item->service?->title); ?>

                                            </td>
                                            <td width='10%'>
                                                <?php echo e($item->name); ?>

                                            </td>
                                            <td width='10%'>
                                                <?php echo e($item->phone); ?>

                                            </td>
                                            <td width='10%'>
                                                <?php echo e($item->email); ?>

                                            </td>
                                            <td width='38%'>
                                                <?php echo e($item->message); ?>

                                            </td>
                                            <td width='12%'>
                                                <p class="mb-0"> <?php echo e($item->createdBy?->name); ?></p>
                                                <p class="mb-0"> <?php echo e($item->created_at); ?></p>
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

    </main><!-- End #main -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/admin/query/index.blade.php ENDPATH**/ ?>
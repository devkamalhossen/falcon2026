<?php $__env->startSection('title', 'Page Management'); ?>
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
            <h1>Page Management</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Manage Page</li>
                    </ol>
                </nav>
                <a href="<?php echo e(route('page.create')); ?>" class="btn btn-primary btn-sm">Add New</a>
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
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if($item->image): ?>
                                                    <img src="<?php echo e(asset($item->image)); ?>" class="rounded" alt=""
                                                        width="100">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('admin/assets/img/1920X1080.svg')); ?>"
                                                        class="rounded" alt="" width="50">
                                                <?php endif; ?>

                                            </td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td>
                                                <p class="mb-0"> <?php echo e($item->createdBy?->name); ?></p>
                                                <p class="mb-0"> <?php echo e($item->created_at); ?></p>
                                            </td>

                                            <td>
                                                <?php if($item->is_active == 1): ?>
                                                    <span class="badge bg-success">Active</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-start gap-2">
                                                    <div class="dropdown">
                                                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm"
                                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="<?php echo e(route('page.edit', $item->id)); ?>"><i
                                                                        class="bx bxs-edit-alt"></i> Edit</a></li>
                                                            <li>
                                                                <form action="<?php echo e(route('page.destroy', $item->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button style="display: flex;align-items:center;"
                                                                        onclick="return confirm('Are you sure to delete this item?')"
                                                                        class="dropdown-item text-danger" type="submit"><i
                                                                            class="bx bxs-trash"></i> Delete</button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('page.status.update',$item->id)); ?>" class="text-<?php echo e($item->is_active == 1 ? 'danger':'success'); ?>"><i class="ri-eye-<?php echo e($item->is_active == 1 ? 'off-':''); ?>line"></i>   <?php echo e($item->is_active == 1? ' Turn Disable':' Turn Active'); ?></a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
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

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/admin/page/index.blade.php ENDPATH**/ ?>
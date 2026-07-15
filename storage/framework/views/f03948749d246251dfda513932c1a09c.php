<?php $__env->startSection('title', 'Meta SEO'); ?>
<?php $__env->startSection('main'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Meta SEO</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Meta SEO Setting</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Change Password Form -->
                            <form action="<?php echo e(route('setting.general.meta.update')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="cols-12">
                                        <label for="meta_title" class=" col-form-label">Meta Title</label>
                                        <div class="">
                                            <input name="meta_title" type="text" value="<?php echo e(get_option('meta_title')); ?>"
                                                class="form-control" id="meta_title">
                                        </div>


                                        <label for="ct" class="col-form-label">Meta Description</label>
                                        <div class="">
                                            <textarea name="meta_description" rows="4" class="form-control" id="ct"><?php echo e(get_option('meta_description')); ?></textarea>
                                        </div>

                                        <label for="ct" class=" col-form-label">Meta Keywords</label>
                                        <textarea name="meta_keywords" rows="4" class="form-control" id="ct"><?php echo e(get_option('meta_keywords')); ?></textarea>

                                    </div>

                                </div>
                                <div class="row mt-4">
                                    <div class="cols-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/admin/setting/meta-seo.blade.php ENDPATH**/ ?>
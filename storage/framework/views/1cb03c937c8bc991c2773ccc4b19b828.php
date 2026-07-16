<?php $__env->startSection('title', 'General Setting'); ?>
<?php $__env->startSection('main'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>General Setting</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">General Setting</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Change Password Form -->
                            <form action="<?php echo e(route('setting.general.info.update')); ?>" method="POST"
                                enctype="multipart/form-data" id="siteGeneralInfo">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="cols-12 col-lg-9 col-md-8">
                                        <label for="fullName" class=" col-form-label">Site Name</label>
                                        <div class="">
                                            <input name="site_name" type="text" value="<?php echo e(get_option('site_name')); ?>"
                                                class="form-control" id="fullName">
                                        </div>

                                        <label for="Phone" class="col-form-label">Hotline</label>
                                        <div class="">
                                            <input name="hotline" type="text" value="<?php echo e(get_option('hotline')); ?>"
                                                class="form-control" id="Phone">
                                        </div>
                                        <label for="Quick" class="col-form-label">Quick Contact</label>
                                        <div class="">
                                            <input name="quick_contact" type="text"
                                                value="<?php echo e(get_option('quick_contact')); ?>" class="form-control"
                                                id="Quick Contact">
                                        </div>

                                        <label for="Phone" class=" col-form-label">Phone</label>
                                        <div class="">
                                            <input name="phone" type="text" value="<?php echo e(get_option('phone')); ?>"
                                                class="form-control" id="Phone">
                                        </div>


                                        <label for="Email" class=" col-form-label">Email</label>
                                        <div class="9">
                                            <input name="email" type="email" value="<?php echo e(get_option('email')); ?>"
                                                class="form-control" id="Email">
                                        </div>

                                        <label for="ct" class="col-form-label">Copyright Text</label>
                                        <div class="">
                                            <input name="copyright_text" type="text"
                                                value="<?php echo e(get_option('copyright_text')); ?>" class="form-control"
                                                id="ct">
                                        </div>

                                        <label for="ct" class="col-form-label">Address</label>
                                        <div class="">
                                            <textarea name="address" rows="1" class="form-control" id="ct"><?php echo e(get_option('address')); ?></textarea>
                                        </div>

                                        <label for="ct" class=" col-form-label">Google Map Location
                                            Iframe</label>
                                        <textarea name="google_map_location" rows="5" class="form-control" id="ct"><?php echo e(get_option('google_map_location')); ?></textarea>

                                        <label for="site_banner_title" class="col-form-label">Home Banner Title</label>
                                        <div class="">
                                            <input name="site_banner_title" type="text"
                                                value="<?php echo e(get_option('site_banner_title')); ?>" class="form-control"
                                                id="site_banner_title">
                                        </div>
                                        <label for="site_banner_sub_title" class=" col-form-label">Home Banner Sub
                                            Title</label>
                                        <textarea name="site_banner_sub_title" rows="5" class="form-control" id="ct"><?php echo e(get_option('site_banner_sub_title')); ?></textarea>

                                    </div>
                                    <div class="cols-12 col-lg-3 col-md-3">
                                        <div class=" p-2 text-center mt-6">
                                            <div>
                                                <?php if(get_option('site_logo')): ?>
                                                    <img id="profileImage" src="<?php echo e(asset(get_option('site_logo'))); ?>"
                                                        alt="Profile" width="50%">
                                                <?php else: ?>
                                                    <img id="profileImage"
                                                        src="<?php echo e(asset('admin/assets/img/placeholder.png')); ?>"
                                                        alt="Profile" width="90%">
                                                <?php endif; ?>
                                                <div class="pt-2">
                                                    <!-- Hidden File Input -->
                                                    <input type="file" name="site_logo" id="profileImageInput"
                                                        style="display: none;">

                                                    <!-- Upload Button -->
                                                    <a href="#" class="btn btn-primary btn-sm" title="Upload image"
                                                        id="uploadImageButton">
                                                        <i class="bi bi-upload"></i>
                                                    </a>

                                                    <!-- Remove Button -->
                                                    <a href="#" class="btn btn-danger btn-sm" title="Remove image"
                                                        id="removeImageButton">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="p-2 text-center mt-6">
                                            <div>
                                                <?php if(get_option('favicon')): ?>
                                                    <img id="faviconImg" src="<?php echo e(asset(get_option('favicon'))); ?>"
                                                        alt="Favicon" width="20%">
                                                <?php else: ?>
                                                    <img id="faviconImg" src="<?php echo e(asset('admin/assets/img/48X48.svg')); ?>"
                                                        alt="Favicon" width="90%">
                                                <?php endif; ?>
                                                <div class="pt-2">
                                                    <!-- Hidden File Input -->
                                                    <input type="file" name="favicon" id="faviconImageInput"
                                                        style="display: none;">

                                                    <!-- Upload Button -->
                                                    <a href="#" class="btn btn-primary btn-sm" title="Upload image"
                                                        id="uploadFaviconImageButton">
                                                        <i class="bi bi-upload"></i>
                                                    </a>

                                                    <!-- Remove Button -->
                                                    <a href="#" class="btn btn-danger btn-sm" title="Remove image"
                                                        id="removeFaviconImageButton">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                                <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                          <div class="mt-4">
                                             <?php if(get_option('home_feature_video')): ?>
                                                        <video id="videoTag" width="350" height="220" controls
                                                            autoplay>
                                                            <source src="<?php echo e(asset(get_option("home_feature_video"))); ?>" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    <?php else: ?>
                                                        <video id="videoTag" width="350" height="220"  controls autoplay></video>
                                            
                                                    <?php endif; ?>
                                            
                                            <div class="pt-2">
                                                <!-- Hidden File Input -->
                                                <input type="file" name="home_feature_video" id="videoInputTag"
                                                    style="display: none;">

                                                <!-- Upload Button -->
                                                <a href="#" class="btn btn-primary btn-sm" title="Upload Video"
                                                    id="uploadVideoButton">
                                                    <i class="bi bi-upload"></i>
                                                </a>

                                                <!-- Remove Button -->
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove Video"
                                                    id="removeVideoButton">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                            <?php $__errorArgs = ['home_feature_video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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


<?php $__env->startSection('scripts'); ?>
    <script>
        // Handle Upload Button Click
        document.getElementById('uploadImageButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('profileImageInput').click();
        });

        // Handle Image File Selection
        document.getElementById('profileImageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        // Handle Favicon Remove Button Click
        document.getElementById('removeImageButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('profileImage').setAttribute('src',
                '<?php echo e(asset('admin/assets/img/300X300.svg')); ?>');
        });

        // Handle  Upload Favicon Button Click
        document.getElementById('uploadFaviconImageButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('faviconImageInput').click();
        });

        // Handle Favicon Image File Selection
        document.getElementById('faviconImageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('faviconImg').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        // Handle Remove Favicon Button Click
        document.getElementById('removeFaviconImageButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('faviconImg').setAttribute('src',
                '<?php echo e(asset('admin/assets/img/48X48.svg')); ?>');
        });
    </script>

    <script>
        // Handle Upload Button Click
        document.getElementById('uploadVideoButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('videoInputTag').click();
        });

        // Handle Image File Selection
        document.getElementById('videoInputTag').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('videoTag').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        // Handle Remove Button Click
        document.getElementById('removeVideoButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('videoTag').setAttribute('src', '');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\falcon2026\resources\views/admin/setting/general.blade.php ENDPATH**/ ?>
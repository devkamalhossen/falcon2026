<?php $__env->startSection('title', 'Home Intro'); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        .dropdown-menu li a {
            display: flex;
            align-items: center;
            padding: 5px !important;
        }

        #tag-input {
            min-height: 42px;
            cursor: text;
        }

        #video-input:focus {
            outline: none;
            border: none;
        }

        .tag {
            background: #007bff;
            color: #fff;
            padding: 4px 10px;
            border-radius: 20px;
            margin: 3px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .tag .remove-tag {
            margin-left: 6px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Home Intro</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Home Intro Content</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <form class="row g-2" action="<?php echo e(route('home.intro.update', $pageData?->id)); ?>"
                                id="homeIntroForm" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" placeholder="Title"
                                        class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title"
                                        value="<?php echo e($pageData?->title); ?>">
                                    <?php $__errorArgs = ['title'];
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
                               
                                <div class="col-12">
                                    <label for="video_id" class="form-label">Video IDs</label>
                                    <div id="tag-input" class="form-control d-flex flex-wrap">
                                        <input type="text" id="video-input" placeholder="Type video ID and press Enter or comma"
                                            class="border-0 flex-grow-1">
                                    </div>
                                    <input type="hidden" name="video_id" id="video_id" value="<?php echo e($pageData?->video_id); ?>">
                                    <?php $__errorArgs = ['video_id'];
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
                                <div class="col-12">
                                    <label for="ct" class="col-form-label">Description</label>
                                    <div style="height: 300px;overflow: auto;">
                                        <div class="home_intro-quill-editor-full">
                                            <?php echo $pageData?->description; ?></div>
                                        <input type="hidden" name="description" id="description"
                                            value="<?php echo e($pageData?->description); ?>" />
                                    </div>
                                    <?php $__errorArgs = ['description'];
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

                                <div class="row mt-10">
                                    <div class="col-12">

                                        <div class="text-end mt-10">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tagInputContainer = document.getElementById("tag-input");
            const videoInput = document.getElementById("video-input");
            const hiddenInput = document.getElementById("video_id");

            let tags = hiddenInput.value ? hiddenInput.value.split(",") : [];

            function renderTags() {
                // clear all except input
                tagInputContainer.querySelectorAll(".tag").forEach(tag => tag.remove());

                tags.forEach((tag, index) => {
                    const span = document.createElement("span");
                    span.className = "tag";
                    span.innerHTML = `${tag} <span class="remove-tag" data-index="${index}">&times;</span>`;
                    tagInputContainer.insertBefore(span, videoInput);
                });

                hiddenInput.value = tags.join(",");
            }

            videoInput.addEventListener("keydown", function(e) {
                if (e.key === "Enter" || e.key === ",") {
                    e.preventDefault();
                    let value = videoInput.value.trim().replace(/,/g, "");
                    if (value && !tags.includes(value)) {
                        tags.push(value);
                        renderTags();
                    }
                    videoInput.value = "";
                }
            });

            tagInputContainer.addEventListener("click", function(e) {
                if (e.target.classList.contains("remove-tag")) {
                    tags.splice(e.target.dataset.index, 1);
                    renderTags();
                }
                videoInput.focus();
            });

            renderTags();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/admin/home/home-intro.blade.php ENDPATH**/ ?>
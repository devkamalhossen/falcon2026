<?php $__env->startSection('page_title', $data['pageData']?->title); ?>
<?php $__env->startSection('meta_data'); ?>
    <meta name="title" content="<?php echo e($data['pageData']?->meta_title); ?>" />
    <meta name="description" content="<?php echo e($data['pageData']?->meta_description); ?>" />
    <meta name="keywords" content="<?php echo e($data['pageData']?->meta_keywords); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <style>
        /* Green overlay fade + slide out */
        .green-overlay {
            position: absolute;
            inset: 0;
            background-color: #4cbb17;
            /* Green overlay color */
            z-index: 3;
            animation: fadeSlideOut 0.8s ease forwards;
        }

        /* Overlay animation */
        @keyframes fadeSlideOut {
            0% {
                opacity: 1;
                transform: translateX(0);
            }

            60% {
                opacity: 0.9;
            }

            100% {
                opacity: 0;
                transform: translateX(-100%);
                visibility: hidden;
            }
        }

        /* Image zoom-out animation */
        .zoom-out-image {
            transform: scale(2);
            animation: imageZoomOut 0.8s ease forwards;
        }

        /* Keyframes for image zoom-out */
        @keyframes imageZoomOut {
            0% {
                transform: scale(2);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>
    <section class="overflow-hidden ">
        <div class="container relative z-[1]">
            <div class="grid gap-8 lg:gap-16 items-center ">
                <div class="space-y-8 py-12 lg:py-20 xl:py-24">
                    <div class="relative">
                        <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-[70px] text-black font-bold uppercase">
                            <?php echo e($data['pageData']?->title); ?>

                        </h1>
                        <h2 class="stroke-text text-2xl md:text-3xl lg:text-4xl xl:text-[70px] font-bold uppercase">
                            <?php echo e($data['pageData']?->title); ?>

                        </h2>
                    </div>

                    <div
                        class="relative md:absolute md:right-0 md:h-full md:top-0 md:bottom-0 md:w-[55%] z-[2] overflow-hidden">
                        <?php if($data['pageData']?->image): ?>
                            <img  loading="lazy" src="<?php echo e(asset($data['pageData']?->image)); ?>" alt="<?php echo e($data['pageData']?->title); ?>"
                                class="w-full h-full object-cover zoom-out-image">
                        <?php else: ?>
                            <img  loading="lazy" src="<?php echo e(asset('frontend/assets/images/contact-img.jpg')); ?>"
                                alt="<?php echo e($data['pageData']?->title); ?>" class="w-full h-full object-cover zoom-out-image">
                        <?php endif; ?>

                        <!-- Overlay -->
                        <div class="green-overlay"></div>
                    </div>


                    <?php if($data['branches']->count() > 0): ?>
                        <div class="space-y-5 md:w-[35%]">
                            <?php $__currentLoopData = $data['branches']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="group cursor-pointer">
                                    <div class="flex items-center justify-between border-b border-gray-700 pb-4">
                                        <div>
                                            <h3 class="text-4xl  font-medium text-primary mb-2">
                                                <?php echo e($branch->name); ?>

                                            </h3>
                                            <p class="text-xl text-dark mt-2 mb-2">
                                                <?php echo e($branch->location); ?>

                                            </p>
                                            <p class="text-xl text-dark  mt-2 mb-2">
                                                <?php echo e($branch->emails); ?>

                                            </p>
                                            <p class="text-xl text-dark  mt-2 mb-2">
                                                <?php echo e($branch->phone_numbers); ?>

                                            </p>
                                        </div>
                                        <div class="ml-4">
                                            <span
                                                class="text-primary text-xl group-hover:translate-x-2 transition-transform duration-300">
                                                <?php echo config('icon.upRight'); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="bg-[#ECE5DA] py-16 lg:py-24">
        <div class="container">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium">
                    GET IN TOUCH
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 max-w-6xl mx-auto">
                <!-- Contact Form -->
                <div class="space-y-6">
                    <form id="contactForm" class="space-y-6" method="POST" action="<?php echo e(route('contact.form.submit')); ?>">
                        <?php echo csrf_field(); ?>
                        <div>
                            <input type="text" placeholder="Name"
                                class="w-full bg-transparent border-b border-gray-600 focus:border-primary py-3 px-2 focus:outline-none transition-colors duration-300"
                                name="name" required>
                            <span class="text-red-500 text-sm error-name"></span>
                        </div>

                        <div>
                            <input type="email" placeholder="Email"
                                class="w-full bg-transparent border-b border-gray-600 focus:border-primary py-3 px-2 focus:outline-none transition-colors duration-300"
                                name="email" required>
                            <span class="text-red-500 text-sm error-email"></span>
                        </div>

                        <div>
                            <input type="text" placeholder="Phone Number"
                                class="w-full bg-transparent border-b border-gray-600 focus:border-primary py-3 px-2 focus:outline-none transition-colors duration-300"
                                name="phone" required>
                            <span class="text-red-500 text-sm error-phone"></span>
                        </div>

                        <div>
                            <textarea placeholder="Message" rows="4"
                                class="w-full bg-transparent border-b border-gray-600 focus:border-primary py-3 px-2 focus:outline-none resize-none transition-colors duration-300"
                                name="message" required></textarea>
                            <span class="text-red-500 text-sm error-message"></span>
                        </div>

                        <div class="pt-4 h-20">
                            <button type="submit"
                                class="flex items-center space-x-3 hover:text-primary cursor-pointer group hover:scale-110 duration-300 hover:space-x-4 hover:translate-x-2">
                                <div
                                    class="size-8 border border-dark rounded-full flex items-center justify-center relative z-[1] after:absolute after:left-0 after:top-1/2 after:-translate-y-1/2 after:w-0 after:h-0 after:bg-primary after:z-[-1] group-hover:after:h-full group-hover:after:w-full group-hover:text-white overflow-hidden after:rounded-full after:duration-300 group-hover:border-primary">
                                    <?php echo config('icon.arrowRightLine'); ?>

                                </div>
                                <span class="font-semibold">SUBMIT</span>
                            </button>
                        </div>
                        <div id="formMessage" class="mt-4"></div>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8 lg:pl-8 text-xl md:text-2xl font-medium">
                    <?php
                        $hotline = get_option('hotline');
                        $phone = get_option('phone');
                        $email = get_option('email');
                    ?>
                    <?php if($hotline): ?>
                        <div>
                            <h3 class="mb-2">Hotline:</h3>
                            <p><?php echo e($hotline); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($phone): ?>
                        <div>
                            <h3 class="mb-2">Sales:</h3>
                            <p><?php echo e($phone); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($email): ?>
                        <div>
                            <h3 class="mb-2">Email:</h3>
                            <p><?php echo e($email); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section>
        <div class="container py-16">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium">
                    FIND US
                </h2>
            </div>
        </div>

        <div class="aspect-[16/5] bg-gray-700">
            <!-- Placeholder for map - replace with actual Google Maps embed -->
            <iframe src="<?php echo e(get_option('google_map_location')); ?>" width="100%" height="100%" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full">
            </iframe>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#contactForm").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let formData = form.serialize();

                // Clear old errors & messages
                $(".error-name, .error-email, .error-phone, .error-message").text("");
                $("#formMessage").html("");

                $.ajax({
                    url: form.attr("action"),
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        $("#formMessage").html(
                            `<p class="text-green-600 font-semibold">${response.message}</p>`
                        );
                        form[0].reset();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                $(".error-" + field).text(messages[0]);
                            });
                        } else {
                            $("#formMessage").html(
                                `<p class="text-red-600 font-semibold">Something went wrong. Try again!</p>`
                            );
                        }
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/contact.blade.php ENDPATH**/ ?>
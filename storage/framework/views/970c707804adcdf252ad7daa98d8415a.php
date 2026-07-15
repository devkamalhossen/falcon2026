<?php $__env->startSection('page_title', $data['pageData']?->section_title); ?>
<?php $__env->startSection('meta_data'); ?>
    <meta name="title" content="<?php echo e($data['pageData']?->meta_title); ?>" />
    <meta name="description" content="<?php echo e($data['pageData']?->meta_description); ?>" />
    <meta name="keywords" content="<?php echo e($data['pageData']?->meta_keywords); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <section class="py-12 md:py-20 lg:py-24">
        <div class="container relative space-y-20">
            <div data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-dark font-medium uppercase">
                    <?php echo e($data['pageData']?->section_title); ?>

                </h1>

                <h2 class="text-lg">
                    <?php echo e($data['pageData']?->section_description); ?>

                </h2>
            </div>

            <div id="service-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-12 md:gap-16 lg:gap-20">
                <?php echo $__env->make('frontend.includes.service-card', ['services' => $data['services']], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>

            <div id="loading" class="text-center my-10 hidden">
                <span class="text-gray-500">Loading more...</span>
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll(".service-box").forEach((box) => {
            const button = box.querySelector(".detail-btn");

            box.addEventListener("mouseenter", () => {
                button.style.opacity = 1;
                button.style.visibility = 'visible';
            });

            box.addEventListener("mousemove", (e) => {
                const rect = box.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                button.style.left = `${x}px`;
                button.style.top = `${y}px`;
            });

            box.addEventListener("mouseleave", () => {
                button.style.opacity = 0;
                button.style.visibility = 'hidden';
            });
        });
    </script>

      <script>
        let nextPageUrl = "<?php echo e($data['services']->nextPageUrl()); ?>";
        let loading = false;

        window.addEventListener('scroll', () => {
            if (!loading && nextPageUrl && window.innerHeight + window.scrollY >= document.body.offsetHeight -
                200) {
                loadServices();
            }
        });

        function loadServices() {
            loading = true;
            document.getElementById('loading').classList.remove('hidden');

            fetch(nextPageUrl, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('service-grid').insertAdjacentHTML('beforeend', data.html);
                    nextPageUrl = data.next_page_url;
                    loading = false;
                    document.getElementById('loading').classList.add('hidden');
                })
                .catch(() => {
                    loading = false;
                    document.getElementById('loading').classList.add('hidden');
                });
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/services.blade.php ENDPATH**/ ?>
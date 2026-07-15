<?php $__env->startSection('page_title', 'Our Gallery'); ?>
<?php $__env->startSection('meta_data'); ?>
    <meta name="title" content="Gallery - Falcon Solution Limited " />
    <meta name="description" content="Explore the Falcon Solution Limited gallery showcasing premium flooring solutions, construction chemical applications, completed projects, industrial coatings, epoxy flooring" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <section class="py-12 md:py-20 lg:py-24">
        <div class="container relative space-y-20">
            <h1
                class="mb-0 text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-dark font-medium uppercase leading-[150%] animate__animated animate__fadeInUp">
                Our Gallery
            </h1>
            <h2 class="text-xl font-normal">Explore the Falcon Solution Limited gallery showcasing premium flooring solutions, construction chemical applications, completed projects, industrial coatings, epoxy flooring</h2>
            <div id="gallery-grid">
                <?php echo $__env->make('frontend.includes.gallery-card', ['galleryCategories' => $galleryCategories], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            <div id="loading" class="text-center my-10 hidden">
                <span class="text-gray-500">Loading more...</span>
            </div>
        </div>
    </section>


    <?php $__env->startPush('scripts'); ?>
        <script>
            let nextPageUrl = "<?php echo e($galleryCategories->nextPageUrl()); ?>";
            let loading = false;

            window.addEventListener('scroll', () => {
                if (!loading && nextPageUrl && window.innerHeight + window.scrollY >= document.body.offsetHeight -
                    200) {
                    loadMoreGallery();
                }
            });

            function loadMoreGallery() {
                loading = true;
                document.getElementById('loading').classList.remove('hidden');

                fetch(nextPageUrl, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data.html);

                        document.getElementById('gallery-grid').insertAdjacentHTML('beforeend', data.html);
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
        <script src="<?php echo e(asset('frontend/assets/plugins/lightbox.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/frontend/gallery.blade.php ENDPATH**/ ?>
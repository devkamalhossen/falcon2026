<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php
    $site_name = get_option('site_name');
    $favicon = get_option('favicon');
     $google_meta_tags = get_option('google_meta_tags');
    $google_analytics_script = get_option('google_scripts');
    $fb_pixel_meta_tags = get_option('fb_pixel_meta_tags');
    $fb_pixel_scripts = get_option('fb_pixel_scripts');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://falconsolutionbd.com<?php echo e(request()->getRequestUri()); ?>">
    <?php echo $__env->yieldContent('meta_data'); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M58634PT');</script>
<!-- End Google Tag Manager -->

    <?php echo $fb_pixel_meta_tags; ?>

    <?php echo $fb_pixel_scripts; ?>

    
    
    <title>Falcon Solution Limited</title>
    
    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset($favicon)); ?>">
    <style>
        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Black.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Black.woff')); ?>') format('woff');
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-HeavyOblique.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-HeavyOblique.woff')); ?>') format('woff');
            font-weight: 900;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-BlackOblique.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-BlackOblique.woff')); ?>') format('woff');
            font-weight: 900;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Book.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Book.woff')); ?>') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-BookOblique.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-BookOblique.woff')); ?>') format('woff');
            font-weight: normal;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Heavy.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Heavy.woff')); ?>') format('woff');
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Light.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Light.woff')); ?>') format('woff');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Oblique.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Oblique.woff')); ?>') format('woff');
            font-weight: normal;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-MediumOblique.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-MediumOblique.woff')); ?>') format('woff');
            font-weight: 500;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Medium.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Medium.woff')); ?>') format('woff');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-LightOblique.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-LightOblique.woff')); ?>') format('woff');
            font-weight: 300;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir LT Std';
            src: url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Roman.woff2')); ?>') format('woff2'),
                url('<?php echo e(asset('frontend/assets/fonts/AvenirLTStd-Roman.woff')); ?>') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        /* @font-face {

            font-family: "Mallory Book";
            src: url("https://db.onlinewebfonts.com/t/b138bce5cff4301ae63bd75f2b1cea12.eot");
            src: url("https://db.onlinewebfonts.com/t/b138bce5cff4301ae63bd75f2b1cea12.eot?#iefix")format("embedded-opentype"),
                url("https://db.onlinewebfonts.com/t/b138bce5cff4301ae63bd75f2b1cea12.woff2")format("woff2"),
                url("https://db.onlinewebfonts.com/t/b138bce5cff4301ae63bd75f2b1cea12.woff")format("woff"),
                url("https://db.onlinewebfonts.com/t/b138bce5cff4301ae63bd75f2b1cea12.ttf")format("truetype"),
                url("https://db.onlinewebfonts.com/t/b138bce5cff4301ae63bd75f2b1cea12.svg#Mallory Book")format("svg");
        } */

        body {
            font-family: "Avenir LT Std";
        }
       
    /* Smooth transitions */
    #scroll-container {
        transition: all 0.7s ease-out;
    }
    #scroll-zoom-img {
        transition: transform 0.7s ease-out;
    }
   
    </style>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <?php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
    ?>

    <?php if($cssFile): ?>
        <link rel="stylesheet" href="<?php echo e(asset('build/' . $cssFile)); ?>">
    <?php endif; ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
    
    
    <?php echo $__env->make('frontend.includes.schema', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M58634PT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
     <?php echo $google_analytics_script; ?>

    <?php
        $site_social_medias = get_active_social_medias();
    ?>
    <?php echo $__env->make('frontend.includes.header', ['socials' => $site_social_medias, 'site_name' => $site_name], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main>
        <?php echo $__env->yieldContent('main'); ?>
    </main>

    
    
    <a target="_blank" href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', get_option('quick_contact'))); ?>"
       class="fixed bottom-4 right-4 hover:scale-110 duration-300 z-20">
        <img src="<?php echo e(asset('frontend/assets/images/whatsapp-logo.png')); ?>" class="w-16 h-16" alt="Falcon Solution Limited">
    </a>

    <?php echo $__env->make('frontend.includes.footer', ['socials' => $site_social_medias], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/counterup2@2.0.2/dist/index.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('header');
            let lastScroll = window.scrollY;

            window.addEventListener('scroll', function() {
                const currentScroll = window.scrollY;

                if (currentScroll > 0) {
                    header.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'z-50',
                        'transition-transform', 'duration-300', 'bg-[#FFFAF4]');

                    if (currentScroll > lastScroll) {
                        header.classList.add('-translate-y-full');
                    } else {
                        header.classList.remove('-translate-y-full');
                    }
                } else {
                    header.classList.remove('fixed', 'top-0', 'left-0', 'right-0', 'z-50',
                        '-translate-y-full');
                }

                lastScroll = currentScroll;
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll('.counter');
            counters.forEach((el) => {
                new Waypoint({
                    element: el,
                    handler: function() {
                        counterUp.default(el, {
                            duration: 1500,
                            delay: 50,
                        });
                        this.destroy();
                    },
                    offset: 'bottom-in-view'
                });
            });
        });
    </script>
    <script>
        AOS.init();
    </script>
    <script>
    const container = document.getElementById('scroll-container');
    const img = document.getElementById('scroll-zoom-img');

    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY;
        const start = 0;
        const end = 400; // range of scroll effect

        // Clamp scroll progress between 0 and 1
        const progress = Math.min(Math.max((scrollY - start) / (end - start), 0), 1);

        // Width: 80% → 100%
        const width = 80 + (20 * progress);
        if(container){
            container.style.width = `${width}%`;
        }

        // Optional: slight zoom of image
        const scale = 1 + 0.1 * progress;
        if(img){
            img.style.transform = `scale(${scale})`;
        }

       
    });
</script>


    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldContent('footer_scripts'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\falcon2026\resources\views/frontend/master.blade.php ENDPATH**/ ?>
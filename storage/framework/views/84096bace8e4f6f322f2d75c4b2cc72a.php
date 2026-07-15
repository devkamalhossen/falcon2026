<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Internal Server Error</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style type="text/tailwindcss">
      @theme {
        --color-primary: #4cbb17;
      }
    </style>
</head>
<body>
<main class="grid min-h-screen place-items-center bg-[#FFFAF4] px-6 py-24 sm:py-32 lg:px-8 relative">
    <img src="<?php echo e(asset('frontend/assets/images/logo.png')); ?>" alt="Falcon Solution" class="h-10 absolute left-10 top-10 w-auto object-contain">

    <div class="text-center">
        <h1 class="mt-4 text-5xl font-semibold tracking-tight text-balance text-primary sm:text-7xl">500</h1>
        <p class="mt-6 text-lg font-normal text-pretty text-slate-500 sm:text-xl/8 max-w-md">Something went wrong on our end. Please try again later.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="<?php echo e(url()->previous()); ?>" type="submit" class="flex items-center space-x-3 hover:text-primary cursor-pointer group hover:scale-110 duration-300 hover:space-x-4 hover:translate-x-2">
                <div
                    class="size-8 border border-dark rounded-full flex items-center justify-center relative z-[1] after:absolute after:left-0 after:top-1/2 after:-translate-y-1/2 after:w-0 after:h-0 after:bg-primary after:z-[-1] group-hover:after:h-full group-hover:after:w-full group-hover:text-white overflow-hidden after:rounded-full after:duration-300 group-hover:border-primary">
                    <?php echo config('icon.arrowRightLine'); ?>

                </div>
                <span class="font-medium uppercase">Go back home</span>
            </a>
        </div>
    </div>
</main>

</body>
</html><?php /**PATH /home/falconso/public_html/resources/views/errors/500.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo e(asset('admin/assets/img/favicon.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('admin/assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('admin/assets/css/style.css')); ?>" rel="stylesheet">

</head>

<body>
    <?php echo $__env->yieldContent('main'); ?>
    <script src="<?php echo e(asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home/falconso/public_html/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>
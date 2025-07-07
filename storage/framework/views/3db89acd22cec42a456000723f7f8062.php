<meta charset="utf-8" />
<title> <?php echo $__env->yieldContent('title'); ?> | Admin & Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo e(display_file(setting('fav_icon'))); ?>">
<!-- Bootstrap Css -->
<link href="<?php echo e(asset('build/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo e(asset('build/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?php echo e(asset('build/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
<style>
    .count-danger {
        padding: 5px 10px;
        background-color: #901616;
        border-radius: 50%;
    }
</style>
<?php if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl'): ?>
    <link href="<?php echo e(asset('build/css/app-rtl.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

<?php endif; ?>
<?php echo $__env->yieldContent('css'); ?>
<?php /**PATH /home/u187789736/domains/zain-market.com/public_html/resources/views/layouts/head-css.blade.php ENDPATH**/ ?>
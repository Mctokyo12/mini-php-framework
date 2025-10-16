<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
    <header>
        <nav>
            <a href="<?php echo e(BASE_PATH); ?>/">home</a>
            <a href="<?php echo e(BASE_PATH); ?>/about">About</a>
            <a href="<?php echo e(BASE_PATH); ?>/signup">inscription</a>
        </nav>
    </header>
    <br>
    <main>
       <?php echo $__env->yieldContent("content"); ?>
    </main>
    <footer>
        <p>&copy; <?php echo e(date("Y")); ?>  My Mini Framework</p>
    </footer>
</body>
</html><?php /**PATH C:\xampp\htdocs\mini-php-framework\app\Views/layouts/app.blade.php ENDPATH**/ ?>
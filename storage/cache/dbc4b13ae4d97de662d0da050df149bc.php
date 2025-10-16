<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
</head>
<body>
    <header>
        <nav>
            <a href="/">home</a>
            <a href="/about">About</a>
            <a href="/signup">inscription</a>
        </nav>
    </header>
    <main>
        <?php $__env->startSection('content'); ?>
            <h1><?php echo e($message); ?></h1>
            <?php if(count($users) > 0): ?>
                <ul>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($user['prenom']); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            
            <?php endif; ?>
        <?php $__env->stopSection(); ?>
    </main>
</body>
</html><?php /**PATH C:\xampp\htdocs\mini-php-framework\app\view/app.blade.php ENDPATH**/ ?>
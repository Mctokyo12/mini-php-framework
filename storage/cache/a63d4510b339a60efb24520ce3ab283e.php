

<?php $__env->startSection("title" , "Home"); ?>

<?php $__env->startSection('content'); ?>
    <ul>
        <h1><?php echo e($message); ?></h1>
        <?php if(count($users) > 0): ?>
            <ul>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($user['prenom']); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        
        <?php endif; ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mini-php-framework\app\Views/home.blade.php ENDPATH**/ ?>
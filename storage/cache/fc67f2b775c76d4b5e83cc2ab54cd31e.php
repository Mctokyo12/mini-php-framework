

<?php $__env->startSection("title" , "Signup"); ?>

<?php $__env->startSection("content"); ?>


    <?php if(!empty($errors)): ?>
        <ul style="color:red">
            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldErros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <?php $__currentLoopData = $fieldErros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <li><?php echo e($error); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php elseif(isset($user)): ?>
        <p>Utilisateur ,<?php echo e($user['prenom']); ?> a ete creer  avec succes !</p>
    <?php else: ?>
        <h1>Inscription</h1>
    
        <form action="<?=BASE_PATH?>/inscrire" method="post">
            <label for="nom">Name:</label>
            <input type="text" name="nom" id=""><br>
            <label for="name">Prenom:</label>
            <input type="text" name="prenom" id=""><br>
            <label for="name">Email:</label>
            <input type="text" name="email" id=""><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id=""><br>
            <input type="submit" value="s'inscrire">
        </form>
    <?php endif; ?>
    

<?php $__env->stopSection(); ?>    
<?php echo $__env->make("layouts.app", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mini-php-framework\app\Views/inscription.blade.php ENDPATH**/ ?>
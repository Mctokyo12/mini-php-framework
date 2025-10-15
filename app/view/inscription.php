<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    
    <?php if (!empty($errors)) { ?>
        <ul style="color:red">
            <!-- <pre>
                <?php print_r($errors)?>
            </pre> -->
            <?php foreach ($errors as $fieldErros) {?> 
                <?php foreach ($fieldErros as $error) {?>
                    <li><?=$error?></li>
               <?php }?>
           <?php }?>
        </ul>
    <?php }else if(isset($user)){ ?>
        <p>Utilisateur , <?= htmlspecialchars($user['prenom'])?> a ete creer  avec succes !</p>
    <?php }else{ ?>
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
    <?php }?>
</body>
</html>
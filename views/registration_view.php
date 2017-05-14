<?php
include 'examples/head.php';
include 'examples/header.php';
require_once 'models/mod_registration.php';
?>



<form class="login" method="post" action="">
    
    <?php if ($good) { ?> 
       <p style="color: green">
            <?=$good ?>
        </p>
    <?php } else { ?>
        
    <label for="login">Ваш логін</label>
    <input type="text" id="login" name="login" value="<?=$data['login'] ?>"/>

    <label for="password">Ваш Email</label>
    <input type="email" id="email" name="email" value="<?=$data['email'] ?>"/>

    <label for="password">Ваш пароль</label>
    <input type="password" id="password" name="password" 
           value="<?= $data['password']?>"/>

    <label for="password">Введіть Ваш пароль ще раз</label>
    <input type="password" id="password_2" name="password_2" 
           value="<?=$data['password_2']?>"/>

    <?php if ($error) { ?> 
        <p style="color: red">
            <?=$error ?>
        </p>
    <?php } ?>

    <input type="submit" value="Реєстрація" name="submit" />
    
    <?php } ?>
</form>
<?=include 'examples/footer.php'; ?>
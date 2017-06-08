<?php
include 'examples/head.php';
include 'examples/header.php';
require_once 'models/mod_login.php';
?>

<form class="login" method="post" action="">
        <label for="login">Логін</label>
        <input type="text" id="login" name="login" maxlength="20"
               value="<?=$data['login'] ?>"/>
        
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" maxlength="20"
               value="<?=$data['password'] ?>"/>

        <?php if ($error) { ?> 
            <p style="color: red">
                <?= $error ?>
            </p>
        <?php } ?>

        <input type="submit" value="Вхід" name="submit"/>
</form>

<?=include 'examples/footer.php'; ?>
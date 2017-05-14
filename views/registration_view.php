<?php
include 'examples/head.php';
include 'examples/header.php';
require_once 'models/mod_registration.php';
?>

<?php if($error){ ?>
<div style="color: red">
    <?=$error?>
</div>
<?php } ?>

<form class="login" method="post" action="">
	<label for="login">Ваш логін</label>
	<input type="text" id="login" name="login" />
        
        <label for="password">Ваш Email</label>
	<input type="email" id="email" name="email" />
        
	<label for="password">Ваш пароль</label>
	<input type="password" id="password" name="password" />
        
        <label for="password">Введіть Ваш пароль ще раз</label>
	<input type="password" id="password" name="password_2" />
        
        <input type="submit" value="Реєстрація" name="submit" />
</form>

<?=include 'examples/footer.php'; ?>

<?php
include 'examples/head.php';
include 'examples/header.php';
?>

<form class="login" method="post" action="">
	<label for="login">Логин</label>
	<input type="text" id="login" name="login" />
	<label for="password">Пароль</label>
	<input type="password" id="password" name="password" />
        <label for="password">Повтор пароля</label>
	<input type="password" id="password" name="password2" />
	<input type="submit" value="Реєстрація" />
</form>

<?=include 'examples/footer.php'; ?>

<?php
include 'examples/head.php';
include 'examples/header.php';
?>

<form class="login" method="post" action="">
	<label for="login">Логин</label>
	<input type="text" id="login" name="login" />
	<label for="password">Пароль</label>
	<input type="password" id="password" name="password" />
	<input type="submit" value="Войти" />
</form>

<?=include 'examples/footer.php'; ?>
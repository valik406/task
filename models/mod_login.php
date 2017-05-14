<?php
require 'models/mod_connectionSQL.php';

$data = $_POST;
if (isset($data[submit])) {
    $errors = array();

    if (trim($data['login']) == '') {
        $errors[] = 'Введіть логін!';
    }

    if ($data['password'] == '') {
        $errors[] = 'Введіть пароль!';
    }

    $user = R::findOne('users', 'login = ?', array($data['login']));
    if ($user) {
        //Логін існує
        if (password_verify($data['password'], $user->password)) {
            $_SESSION['logged_user'] = $user;
            $_SESSION['login'] = $_SESSION['logged_user']->login;
            $good = 'Ви успішно ввійшли!';
        } else {
            $errors[] = 'Пароль введено не вірно!';
        }
    } else {
        $errors[] = 'Користувача з таким логіном не знайдено!';
    }
    $error = array_shift($errors);
}

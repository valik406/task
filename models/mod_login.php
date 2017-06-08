<?php
require 'models/mod_connectionSQL.php';
require 'models/mod_class_verification.php';

$data = $_POST;
if (isset($data[submit])) {
    $errors = array();

    $verification = new Verification;
    $verification->login = $data['login'];
    $verification->password = $data['password'];
    
    if($verification->login()){
    foreach ($verification->login() as $value) {
       $errors[] = $value; 
    }
    }
    
    if($verification->password()){
    foreach ($verification->password() as $value) {
       $errors[] = $value; 
    }
    }



    $user = R::findOne('users', 'login = ?', array($data['login']));
    if ($user) {
        //Логін існує
        if (password_verify($data['password'], $user->password)) {
            $_SESSION['login'] = strtolower($user->login);
            $_SESSION['login_orig'] = $user->login;
            echo "<script>window.location.href='/'</script>";
        } else {
            $errors[] = 'Пароль введено не вірно!';
        }
    } else {
        $errors[] = 'Користувача з таким логіном не знайдено!';
    }
    $error = array_shift($errors);
}

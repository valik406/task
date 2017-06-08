<?php
require 'models/mod_connectionSQL.php';
require 'models/mod_class_verification.php';

$data = $_POST;

   //Реєстрація

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

    if(trim($data['email']) == ''){
        $errors[] = 'Введіть email!';
    }
    
    if($verification->password()){
    foreach ($verification->password() as $value) {
       $errors[] = $value; 
    }
    }
    
    if($data['password_2'] != $data['password']){
        $errors[] = 'Повторний пароль введено невірно!';
    }
    
    if( R::count('users', 'login = ?', array($data['login'])) > 0){
        $errors[] = 'Користувач з таким логіном вже існує!';
    }
    
    if( R::count('users', 'email = ?', array($data['email'])) > 0){
        $errors[] = 'Користувач з таким email вже існує!';
    }
    //Все добре реєструємо
    
    if(empty($errors)){
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);
        
        $good = 'Ви успішно зареєструвалися!';

    }
    // Виводимо ошибку
    else {
        $error = array_shift($errors);
    }
}
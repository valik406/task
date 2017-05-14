<?php
require 'models/mod_connectionSQL.php';

$data = $_POST;

   //Реєстрація

if (isset($data[submit])) {
    $errors = array();
    
    if(trim($data['login']) == ''){
        $errors[] = 'Введіть логін';
    }
    
     if(trim($data['email']) == ''){
        $errors[] = 'Введіть email';
    }
    
     if($data['password'] == ''){
        $errors[] = 'Введіть пароль';
    }
    
    if($data['password_2'] != $data['password']){
        $errors[] = 'Повторний пароль введений невірно';
    }
    
    //Все добре реєструємо
    
    if(empty($errors)){
        echo 'Реєстраця';
    }
    // Виводимо ошибку
    else {
        $error = array_shift($errors);
    }
}
 else {
    echo 'Ошибка 2';
    echo $data[submit];
}
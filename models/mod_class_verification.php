<?php

class Verification {

protected $errors = array();
public $login;
public $password;

public function login(){
    
    //Перевірка чи логін не пустий
    if(trim($this->login) == ''){   
        $errors[] = 'Введіть логін!';
    }
    
     //Перевірка чи логін починається з латинського символа
    if(                                                
            (ord($this->login{0}) < ord('A')) || 
            (ord($this->login{0}) > ord('Z') && ord($this->login{0}) < ord('a')) ||
            (ord($this->login{0}) > ord('z'))
            ){
        $errors[] = 'Логін повинен починатися з латинських символів [a-z],[A-Z]!';
    }
    
    //Перевірка чи логін складається з латинських літер та чисел
    $chars = preg_split('//', $this->login, -1, PREG_SPLIT_NO_EMPTY);//Рядок переводимо в масив символів з яких складається даний рядок. 
    foreach ($chars as $key_f => $value) {   // Повертаємо ASCII-код у вигляді цілого числа для кожного символу
        if(
            (ord($value) < ord('0')) ||
            (ord($value) > ord('9') && ord($value) < ord('A')) || 
            (ord($value) > ord('Z') && ord($value) < ord('a')) ||
            (ord($value) > ord('z'))
            ){
            $errors[] = 'Логін повинен складатися лише з латинських символів [a-z],[A-Z], ти чисел [0-9]!';
            } 
    }
    
    //Перевірка чи логін не менше 5 символів
    if(strlen($this->login) <= 5){        
        $errors[] = 'Логін повинен містити, щонайменше, 6 символів!';
    }
   
    //Перевірка чи логін складається не більше 20 символів
    if(strlen($this->login) >= 21){
        $errors[] = 'Логін повинен містити, не більше, 20 символів!';
    }
    
  return $errors;   

}


public function password(){
    
    //Перевірка чи пароль не пустий
    if(trim($this->password) == ''){   
        $errors[] = 'Введіть пароль!';
    }
    
    //Перевірка чи пароль не менше 5 символів
    if(strlen($this->password) <= 5){        
        $errors[] = 'Пароль повинен містити, щонайменше, 6 символів!';
    }
   
    //Перевірка чи пароль складається не більше 20 символів
    if(strlen($this->password) >= 21){
        $errors[] = 'Пароль повинен містити, не більше, 20 символів!';
    }
    
     return $errors; 
}
}
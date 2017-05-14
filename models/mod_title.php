<?php

$page = $_GET['page'];

if (!isset($page)) {
    $title = 'Задачник';
} elseif ($page == 'login') {
    $title = 'Вхід';
} elseif ($page == 'registration') {
    $title = 'Реєстрація';
} else {
    $title = 'Ошибка 404';
}


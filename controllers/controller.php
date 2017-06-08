<?php

$page = $_GET['page'];
$action = $_GET['action'];
$id = $_GET['id'];

if (!isset($page)){
    require_once ('views/home_view.php');
} elseif ($page == 'login'){
    require_once ('views/login_view.php');
} elseif ($page == 'registration'){
    require_once ('views/registration_view.php');
} elseif ($page == 'out'){
   require_once ('models/out.php');
} elseif ($page == 'about'){
    require_once ('views/about_view.php');
} else{
    require_once ('views/page404_view.php');
}
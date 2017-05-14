<?php

$page = $_GET['page'];


if (!isset($page)){
    require_once ('views/home_view.php');
} elseif ($page == 'login'){
    require_once ('views/login_view.php');
} elseif ($page == 'registration'){
    require_once ('views/registration_view.php');
} elseif ($page == 'out'){
   require_once ('models/out.php');
}
else{
    require_once ('views/page404_view.php');
}
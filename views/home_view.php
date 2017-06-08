<?php
session_start();
if(isset($_SESSION['login'])){ 
include 'listTask_viev.php';
}

 else {
   include 'about_view.php'; 
}
?>
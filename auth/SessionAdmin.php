<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("Location:login");
    exit;
}else if(isset($_POST['option']) && $_POST['option'] === 'Site'){
    require 'controller/ModelJson.php';
    require 'controller/LoginRegister.php';
}else
    require 'controller/ModelJson.php';

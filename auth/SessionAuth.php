<?php
session_start();
if(isset($_SESSION['userId']) && !isset($_POST['change_language'])){
    header("Location:index");
    exit;
}else if(isset($_GET['id']) && !isset(json_decode(file_get_contents('data.json'), true)[$_GET['id']]) ||
$_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['superId']) ||
$_SERVER["REQUEST_METHOD"] === "POST" && !isset(json_decode(file_get_contents('data.json'), true)[$_POST['superId']]))
    header("Location:Login");
else if(isset($_POST['change_language']) && $_POST['change_language'] === 'Site')
    require 'controller/ModelJson.php';
else{
    require 'controller/ModelJson.php';
    require 'controller/LoginRegister.php';
}
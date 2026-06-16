<?php
//ignore session changelanguage site
session_start();
if(isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location:index");
    exit;
}else if(isset($_GET['id']) && !isset(json_decode(file_get_contents('data.json'), true)[$_GET['id']]) ||
$_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['superId']) ||
$_SERVER["REQUEST_METHOD"] === "POST" && !isset(json_decode(file_get_contents('data.json'), true)[$_POST['superId']])){
    header("Location:Login");
    exit;
}
else{
    require 'controller/ModelJson.php';
    require 'controller/LoginRegister.php';
}
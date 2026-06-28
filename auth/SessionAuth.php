<?php
require 'controller/ModelJson.php';
session_start();
if(isset($_SESSION['userId']) && ModelJson::getFileName() !== "site"){
    header("Location:index");
    exit;
}else if(isset($_GET['id']) && !isset(json_decode(file_get_contents('data.json'), true)[$_GET['id']]) ||
$_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['superId']) ||
$_SERVER["REQUEST_METHOD"] === "POST" && !isset(json_decode(file_get_contents('data.json'), true)[$_POST['superId']])||
ModelJson::getFileName() === 'ChangeLangPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'LoginPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'RegisterPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'SetupProject' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'LoginForgetPasswordPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLangPost' && !isset($_POST['option'])||
ModelJson::getFileName() === 'ChangeLangPost' && $_POST['option'] !== 'Login' && $_POST['option'] !== 'Register' && $_POST['option'] !== 'Site'||
ModelJson::getFileName() === 'ChangeLangPost' && !isset($_POST['state'])||
ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] !== 'AllNamesLanguage' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'branch' && $_POST['state'] !== 'branch2'||
ModelJson::getFileName() === 'SetupProject' && !isset($_POST['option'])||
ModelJson::getFileName() === 'SetupProject' && $_POST['option'] !== 'Login' && $_POST['option'] !== 'Register'){
    header("Location:Login");
    exit;
}
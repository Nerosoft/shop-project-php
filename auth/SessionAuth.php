<?php
//ignore session changelanguage site
session_start();
if(isset($_SESSION['userId']) && pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] !== "site"){
    header("Location:index");
    exit;
}else if(isset($_GET['id']) && !isset(json_decode(file_get_contents('data.json'), true)[$_GET['id']]) ||
$_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['superId']) ||
$_SERVER["REQUEST_METHOD"] === "POST" && !isset(json_decode(file_get_contents('data.json'), true)[$_POST['superId']])||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLangPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'LoginPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'RegisterPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'SetupProject' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'LoginForgetPasswordPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLangPost' && !isset($_POST['option'])||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLangPost' && $_POST['option'] !== 'Login' && $_POST['option'] !== 'Register' && $_POST['option'] !== 'Site'||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLangPost' && !isset($_POST['state'])||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLangPost' && $_POST['state'] !== 'AllNamesLanguage' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'branch' && $_POST['state'] !== 'branch2'||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'SetupProject' && !isset($_POST['option'])||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'SetupProject' && $_POST['option'] !== 'Login' && $_POST['option'] !== 'Register'){
    header("Location:Login");
    exit;
}
else
    require 'controller/ModelJson.php';
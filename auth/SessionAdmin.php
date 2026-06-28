<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("Location:login");
    exit;
}
else if(pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'BranchChangePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'BranchCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'BranchDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'BranchEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLanguageCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLanguageDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'FlexTablesCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'HomeCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'HomeDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'HomeEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ProductCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'SettingUsersCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'SystemLangEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'SettingUsersDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'SettingUsersDeletePost' && !isset($_GET['id'])||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLanguageEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLanguageEditPost' && !isset($_POST['option'])||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLanguageEditPost' && $_POST['option'] !== 'ChangeLanguage' && $_POST['option'] !== 'MyStyle'||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLanguagePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLanguagePost' && !isset($_POST['option'])||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLanguagePost' && !isset($_POST['state'])||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'ChangeLanguagePost' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'AllNamesLanguage'||
pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'BranchChangePost' && !isset($_POST['option'])){
    header("Location:index");
    exit;
}else if(isset($_POST['option']) && $_POST['option'] === 'Site'){
    require 'controller/ModelJson.php';
    require 'controller/LoginRegister.php';
}else
    require 'controller/ModelJson.php';

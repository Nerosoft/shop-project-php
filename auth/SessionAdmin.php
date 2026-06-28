<?php
require 'controller/ModelJson.php';
session_start();
if(!isset($_SESSION['userId'])){
    header("Location:login");
    exit;
}
else if(ModelJson::getFileName() === 'BranchChangePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'BranchCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'BranchDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'BranchEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLanguageCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'FlexTablesCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'HomeCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'HomeDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'HomeEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ProductCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'SettingUsersCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'SystemLangEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'SettingUsersDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'SettingUsersDeletePost' && !isset($_GET['id'])||
ModelJson::getFileName() === 'ChangeLanguageEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLanguageEditPost' && !isset($_POST['option'])||
ModelJson::getFileName() === 'ChangeLanguageEditPost' && $_POST['option'] !== 'ChangeLanguage' && $_POST['option'] !== 'MyStyle'||
ModelJson::getFileName() === 'ChangeLanguagePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($_POST['option'])||
ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($_POST['state'])||
ModelJson::getFileName() === 'ChangeLanguagePost' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'AllNamesLanguage'||
ModelJson::getFileName() === 'BranchChangePost' && !isset($_POST['option'])){
    header("Location:index");
    exit;
}else if(isset($_POST['option']) && $_POST['option'] === 'Site')
    require 'controller/LoginRegister.php';
    

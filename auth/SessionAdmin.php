<?php
session_start();
require 'controller/ModelJson.php';
require 'controller/InformationPage.php';
if(!isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() !== 'Login' && ModelJson::getFileName() !== 'Register' && ModelJson::getFileName() !== 'Site'){
    header("Location:login");
    exit;
}
else if(
isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables' && !isset($_GET['id'])||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables' && !isset(json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']][json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']]['Setting']['AllNamesLanguage']]['MyFlexTables'][$_GET['id']]) ||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !preg_match('/MyFlexTables/', ModelJson::getBackPage()) ||

isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && ModelJson::getBackPage() !== 'Users' && ModelJson::getBackPage() !== 'Product' && !preg_match('/MyFlexTables/', ModelJson::getBackPage())||

isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchChangePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||


isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'ProductCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLangEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||

isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||


isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && ModelJson::getBackPage() !== 'ChangeLanguage' && ModelJson::getBackPage() !== 'MyStyle'||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($_POST['state'])||
isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'AllNamesLanguage'

){
    header("Location:index");
    exit;
}
else if(!isset($_SESSION['userId']) && isset($_GET['id']) && !isset(json_decode(file_get_contents('data.json'), true)[$_GET['id']]) ||
!isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['superId']) ||
!isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] === "POST" && !isset(json_decode(file_get_contents('data.json'), true)[$_POST['superId']])||
!isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
!isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
!isset($_SESSION['userId']) && ModelJson::getFileName() === 'RegisterPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
!isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject' && $_SERVER["REQUEST_METHOD"] !== "POST"||
!isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginForgetPasswordPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
!isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && !isset($_POST['state'])||
!isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] !== 'AllNamesLanguage' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'branch' && $_POST['state'] !== 'branch2'||
!isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && ModelJson::getBackPage() !== 'Login' && ModelJson::getBackPage() !== 'Register' && ModelJson::getBackPage() !== 'Site'||
!isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject' && ModelJson::getBackPage() !== 'Login' && ModelJson::getBackPage() !== 'Register'

){
    header("Location:Login");
    exit;
}


else if(ModelJson::getFileName() === 'SettingUsersCreatePost' || ModelJson::getFileName() === 'Users' || ModelJson::getFileName() === 'Branches' || ModelJson::getFileName() === 'BranchCreatePost' || ModelJson::getFileName() === 'BranchEditPost' || ModelJson::getFileName() === 'SetupProject' || ModelJson::getFileName() === 'LoginForgetPasswordPost' || ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'LoginPost' || ModelJson::getFileName() === 'Register' || ModelJson::getFileName() === 'RegisterPost'){
    if(ModelJson::getFileName() === 'SettingUsersCreatePost' || ModelJson::getFileName() === 'Users' || ModelJson::getFileName() === 'SetupProject' || ModelJson::getFileName() === 'LoginForgetPasswordPost' || ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'LoginPost' || ModelJson::getFileName() === 'Register' || ModelJson::getFileName() === 'RegisterPost')
        require 'all_trait/ErrorsEmailPassword.php';
    if(ModelJson::getFileName() === 'Branches' || ModelJson::getFileName() === 'BranchCreatePost' || ModelJson::getFileName() === 'BranchEditPost' || ModelJson::getFileName() === 'SetupProject' || ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register')
        require 'all_trait/ErrorBranch.php';
    if(ModelJson::getFileName() === 'Register' || ModelJson::getFileName() === 'RegisterPost')
        require 'all_trait/ErrorRegister.php';
    if(ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register')
        require 'controller/LoginRegister.php';
}else if(ModelJson::getFileName() === 'index' || ModelJson::getFileName() === 'Home' || ModelJson::getFileName() === 'HomeCreatePost' || ModelJson::getFileName() === 'HomeEditPost')
    require 'all_trait/ErrorsHome.php';
else if(ModelJson::getFileName() === 'ChangeLanguageCreatePost' || ModelJson::getFileName() === 'ChangeLanguageEditPost' || ModelJson::getFileName() === 'ChangeLanguage' || ModelJson::getFileName() === 'MyStyle')
    require 'all_trait/ErrorChangelanguage.php';
else if(ModelJson::getFileName() === 'FlexTablesCreatePost' || ModelJson::getFileName() === 'MyFlexTables')
    require 'all_trait/ErrorFlexTable.php';
else if(ModelJson::getFileName() === 'ProductCreatePost' || ModelJson::getFileName() === 'Product')
    require 'all_trait/ErrorProduct.php';
else if(ModelJson::getFileName() === 'SystemLangEditPost' || ModelJson::getFileName() === 'SystemLang')
    require 'all_trait/ErrorSystemlang.php';
    

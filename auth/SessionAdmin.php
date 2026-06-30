<?php
require 'controller/ModelJson.php';
session_start();
if(!isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() !== 'Login' && ModelJson::getFileName() !== 'Register' && ModelJson::getFileName() !== 'Site'){
    header("Location:login");
    exit;
}
else if(
ModelJson::getFileName() === 'MyFlexTables' && !isset($_GET['id'])||
ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($_GET['id'])||
ModelJson::getFileName() === 'FlexTablesCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'MyFlexTables' && !isset(json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']][json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']]['Setting']['AllNamesLanguage']]['MyFlexTables'][$_GET['id']]) ||
ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset(json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']][json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']]['Setting']['AllNamesLanguage']]['MyFlexTables'][$_GET['id']]) ||

ModelJson::getFileName() === 'SettingUsersDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'SettingUsersDeletePost' && !isset($_GET['id'])||
ModelJson::getFileName() === 'SettingUsersDeletePost' && $_GET['id'] !== 'Users' && $_GET['id'] !== 'Product' && !isset(json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']][json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']]['Setting']['AllNamesLanguage']]['MyFlexTables'][$_GET['id']])||

ModelJson::getFileName() === 'BranchChangePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'BranchChangePost' && ModelJson::getBackPage() !== 'Home' &&
ModelJson::getBackPage() !== 'Site' && ModelJson::getBackPage() !== 'ChangeLanguage' &&
ModelJson::getBackPage() !== 'Users' && ModelJson::getBackPage() !== 'Product' && ModelJson::getBackPage() !== 'SystemLang' &&
ModelJson::getBackPage() !== 'Branches' && ModelJson::getBackPage() !== 'MyStyle' &&
!preg_match('/MyFlexTables/', ModelJson::getBackPage())||

ModelJson::getFileName() === 'BranchCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'BranchDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'BranchEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLanguageCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'HomeCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'HomeDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'HomeEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ProductCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'SettingUsersCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'SystemLangEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLanguageEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||

ModelJson::getFileName() === 'ChangeLanguagePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLanguagePost' && ModelJson::getBackPage() !== 'Home' &&
ModelJson::getBackPage() !== 'Site' && ModelJson::getBackPage() !== 'ChangeLanguage' &&
ModelJson::getBackPage() !== 'Users' && ModelJson::getBackPage() !== 'Product' && ModelJson::getBackPage() !== 'SystemLang' &&
ModelJson::getBackPage() !== 'Branches' && ModelJson::getBackPage() !== 'MyStyle' &&
!preg_match('/MyFlexTables/', ModelJson::getBackPage())||

ModelJson::getFileName() === 'ChangeLanguageEditPost' && ModelJson::getBackPage() !== 'ChangeLanguage' && ModelJson::getBackPage() !== 'MyStyle'||
ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($_POST['state'])||
ModelJson::getFileName() === 'ChangeLanguagePost' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'AllNamesLanguage'

){
    header("Location:index");
    exit;
}
else if(!isset($_SESSION['userId']) && isset($_GET['id']) && !isset(json_decode(file_get_contents('data.json'), true)[$_GET['id']]) ||
!isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['superId']) ||
!isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] === "POST" && !isset(json_decode(file_get_contents('data.json'), true)[$_POST['superId']])||
ModelJson::getFileName() === 'ChangeLangPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'LoginPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'RegisterPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'SetupProject' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'LoginForgetPasswordPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
ModelJson::getFileName() === 'ChangeLangPost' && !isset($_POST['state'])||
ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] !== 'AllNamesLanguage' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'branch' && $_POST['state'] !== 'branch2'||
ModelJson::getFileName() === 'ChangeLangPost' && ModelJson::getBackPage() !== 'Login' && ModelJson::getBackPage() !== 'Register' && ModelJson::getBackPage() !== 'Site'||
ModelJson::getFileName() === 'SetupProject' && ModelJson::getBackPage() !== 'Login' && ModelJson::getBackPage() !== 'Register'

){
    header("Location:Login");
    exit;
}else if(ModelJson::getFileName() === 'SettingUsersCreatePost' || ModelJson::getFileName() === 'Users' || ModelJson::getFileName() === 'Branches' || ModelJson::getFileName() === 'BranchCreatePost' || ModelJson::getFileName() === 'BranchEditPost' || ModelJson::getFileName() === 'SetupProject' || ModelJson::getFileName() === 'LoginForgetPasswordPost' || ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'LoginPost' || ModelJson::getFileName() === 'Register' || ModelJson::getFileName() === 'RegisterPost'){
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




// else if(ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register'){
//     require 'controller/LoginRegister.php';
//     require 'controller/'.ModelJson::getFileName().'.php';
//     include 'pis_of_page/end_html.php';
// }
// else if(ModelJson::getFileName() === 'Site'){
//     require 'controller/AdminMenu.php';
//     require 'controller/'.ModelJson::getFileName().'.php';
//     include 'pis_of_page/end_html.php';
// }
// else if($_SERVER["REQUEST_METHOD"] === "GET"){
//     require 'controller/AdminMenu.php';
//     $count = 1;
//     require 'controller/'.(ModelJson::getFileName() === 'index'?'Home':ModelJson::getFileName()).'.php';
//     include 'pis_of_page/end_html.php';
// }

    

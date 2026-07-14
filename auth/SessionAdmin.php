<?php
session_start();
require 'controller/ModelJson.php';
if(ModelJson::getFileName() === 'SettingUsersCreatePost' || ModelJson::getFileName() === 'Users' || ModelJson::getFileName() === 'Branches' || ModelJson::getFileName() === 'BranchCreatePost' || ModelJson::getFileName() === 'BranchEditPost' || ModelJson::getFileName() === 'SetupProject' || ModelJson::getFileName() === 'LoginForgetPasswordPost' || ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'LoginPost' || ModelJson::getFileName() === 'Register' || ModelJson::getFileName() === 'RegisterPost'){
    if(ModelJson::getFileName() === 'SettingUsersCreatePost' || ModelJson::getFileName() === 'Users' || ModelJson::getFileName() === 'SetupProject' || ModelJson::getFileName() === 'LoginForgetPasswordPost' || ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'LoginPost' || ModelJson::getFileName() === 'Register' || ModelJson::getFileName() === 'RegisterPost')
        require 'all_trait/ErrorsEmailPassword.php';
    if(ModelJson::getFileName() === 'Branches' || ModelJson::getFileName() === 'BranchCreatePost' || ModelJson::getFileName() === 'BranchEditPost' || ModelJson::getFileName() === 'SetupProject' || ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register')
        require 'all_trait/ErrorBranch.php';
    if(ModelJson::getFileName() === 'Register' || ModelJson::getFileName() === 'RegisterPost')
        require 'all_trait/ErrorRegister.php';
    if(ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register'){
        require 'all_trait/InfoBranch.php';
        require 'all_trait/InterEmailPass.php';
    }
}else if(ModelJson::getFileName() === 'Home' || ModelJson::getFileName() === 'HomeCreatePost' || ModelJson::getFileName() === 'HomeEditPost')
    require 'all_trait/ErrorsHome.php';
else if(ModelJson::getFileName() === 'ChangeLanguageCreatePost' || ModelJson::getFileName() === 'ChangeLanguageEditPost' || ModelJson::getFileName() === 'ChangeLanguage' || ModelJson::getFileName() === 'MyStyle')
    require 'all_trait/ErrorChangelanguage.php';
else if(ModelJson::getFileName() === 'FlexTablesCreatePost' || ModelJson::getFileName() === 'MyFlexTables')
    require 'all_trait/ErrorFlexTable.php';
else if(ModelJson::getFileName() === 'ProductCreatePost' || ModelJson::getFileName() === 'Product')
    require 'all_trait/ErrorProduct.php';
else if(ModelJson::getFileName() === 'SystemLangEditPost' || ModelJson::getFileName() === 'SystemLang')
    require 'all_trait/ErrorSystemlang.php';
if($_SERVER["REQUEST_METHOD"] === "GET"){
    require 'class_object/MyLanguage.php';
    require 'class_object/BranchClass.php';
    require 'controller/'.ModelJson::getFileName().'.php';
    include 'pis_of_page/end_html.php';
}
    

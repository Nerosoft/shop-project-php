<?php
include 'SessionAdmin.php';
if(isset($_GET['id']))
    switch ($_GET['id']) {
        case 'Home':
            require 'MyHome.php';
            MyHome::initHome(); 
        case 'Branches':
            require 'MyBranch.php';
            MyBranch::initBranch();
        case 'ChangeLanguage':
            require 'MyChangeLanguage.php';
            MyChangeLanguage::initMyChangeLanguage();
        case 'SettingUsers':
            require 'MySettingUsers.php';
            MySettingUsers::initMySettingUsers();
        case 'Product':
            require 'ProductClass.php';
            Product::initProduct();
        case 'MyStyle':
            require 'MyStyleClass.php';
            MyStyleClass::initMyStyleClass();
        case 'SystemLang':
            require 'MySystemlang.php';
            MySystemlang::initMySystemlang();
        default:
            require 'MyFlexTablesView.php';
            MyFlexTablesView::initMyFlexTablesView();
    }
else{
    require 'MyHome.php';
    MyHome::initHome();
}

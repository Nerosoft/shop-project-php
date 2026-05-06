<?php
include 'SessionAdmin.php';
if(isset($_GET['id']))
    switch ($_GET['id']) {
        case 'Home':
            require 'controller/MyHome.php';
            MyHome::initHome(); 
        case 'Branches':
            require 'controller/MyBranch.php';
            MyBranch::initBranch();
        case 'ChangeLanguage':
            require 'controller/MyChangeLanguage.php';
            MyChangeLanguage::initMyChangeLanguage();
        case 'Users':
            require 'controller/MySettingUsers.php';
            MySettingUsers::initMySettingUsers();
        case 'Product':
            require 'controller/ProductClass.php';
            Product::initProduct();
        case 'MyStyle':
            require 'controller/MyStyleClass.php';
            MyStyleClass::initMyStyleClass();
        case 'SystemLang':
            require 'controller/MySystemlang.php';
            MySystemlang::initMySystemlang();
        default:
            require 'controller/MyFlexTablesView.php';
            MyFlexTablesView::initMyFlexTablesView();
    }
else
    header('LOCATION:index');

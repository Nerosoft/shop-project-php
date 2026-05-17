<?php
include 'auth/SessionAdmin.php';
if(isset($_GET['id']))
    ModelJson::initView(($_GET['id'] === 'Home' ||
        $_GET['id'] === 'HomeCreatePost' ||
        $_GET['id'] === 'Branches' ||
        $_GET['id'] === 'ChangeLanguage' ||
        $_GET['id'] === 'Users' ||
        $_GET['id'] === 'Product' ||
        $_GET['id'] === 'SystemLang' ||
        $_GET['id'] === 'MyStyle'? $_GET['id']:'MyFlexTablesView'));
else
    header('LOCATION:index');

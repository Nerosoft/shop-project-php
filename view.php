<?php
include 'auth/SessionAdmin.php';
if(isset($_GET['id'])){
    require 'controller/'.($_GET['id'] === 'Home' ||
    $_GET['id'] === 'Branches' ||
    $_GET['id'] === 'ChangeLanguage' ||
    $_GET['id'] === 'Users' ||
    $_GET['id'] === 'Product' ||
    $_GET['id'] === 'SystemLang' ||
    $_GET['id'] === 'MyStyle'? $_GET['id']:'MyFlexTablesView').'.php';
    ModelJson::initView($_GET['id']);
}
else
    header('LOCATION:index');

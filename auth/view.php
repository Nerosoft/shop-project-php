<?php
require 'auth/SessionAdmin.php';
require 'class_object/MyLanguage.php';
require 'class_object/BranchClass.php';
require 'controller/'.ModelJson::getFileName().'.php';
$view->startPage();
if(ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register')
    $view->initView2();
else if(ModelJson::getFileName() === 'Site')
    $view->getView();
else
    $view->initView();

$view->endPage();

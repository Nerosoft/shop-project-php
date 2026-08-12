<?php
require 'auth/SessionAdmin.php';
require 'class_object/MyLanguage.php';
require 'class_object/BranchClass.php';
require 'controller/'.ModelJson::getFileName().'.php';
$view->startPage();
if(ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register')
    $view->initView2();
else if(ModelJson::getFileName() === 'SystemLang' || ModelJson::getFileName() === 'MyStyle'){
    $view->initView3();
    $view->initView4();
}else if(ModelJson::getFileName() === 'Site'){
    echo '<link rel="stylesheet" href="./asset/css/aos.css">
    <link rel="stylesheet" href="./asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./asset/css/templatemo-digital-trend.css">';
    $view->initView3('');
}
else{
    $view->initView3();
    echo <<<HTML
        <button onclick="openForm('#createModel')" class="btn btn-primary">{$view->getModelPage()['ButtonModelCreate']}</button>
    HTML;
    $view->makeCreateModal($view->getModelPage()['ScreenModelCreate'], $view->getModelPage()['ButtonModelAdd']);
    $view->initView4();
}
$view->endPage();

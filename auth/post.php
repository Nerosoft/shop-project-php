<?php
require 'controller/ModelJson.php';
require 'post/'.ModelJson::getFileName().'.php';
$view->makePost();
if(ModelJson::getFileName() ==='ChangeLanguagePost' && $_POST['state'] === 'AllNamesLanguage'||
    ModelJson::getFileName() ==='ChangeLangPost' && $_POST['state'] === 'AllNamesLanguage')
    $view->Language = $view->keyId;
else if(ModelJson::getFileName() === 'BranchChangePost' || ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] !== 'Style'){
    $view->MyIdDb = $view->keyId;
    $view->Language = ModelJson::getFileName() === 'ChangeLangPost' && isset($_COOKIE[$view->getId().'AllNamesLanguage'])?$_COOKIE[$view->getId().'AllNamesLanguage']:$view->getObj()['AllNamesLanguage'];
}
$view->showMessage();
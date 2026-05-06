<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'ChangeLanguage' || $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'MyStyle'){
require 'controller/'.($_POST['option'] === 'MyStyle'?'MyStyleClass':'MyChangeLanguage').'.php';
require 'ValidationId.php';
class ChangeLanguagePost extends ValidationId{
    function __construct(){
        parent::__construct($_POST['option'], function($myFile){
            return $this->changeLangStylePost($myFile);
        });
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->saveModel($this->changeLangStylePost($this->getObj()));
        $this->initViewPost($_POST['option'] === 'ChangeLanguage'?'ChangeLang':'MessageStyle', 'success');
    }
    function changeLangStylePost($myData){
        $myData['Setting'][$_POST['option'] === 'MyStyle'?'Style':'Language'] = $_POST['id'];
        return $myData;
    }
}
new ChangeLanguagePost();
}else
    header('LOCATION:index');
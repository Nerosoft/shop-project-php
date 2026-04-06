<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'ChangeLanguage' || $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'MyStyle'){
require ($_POST['option'] === 'MyStyle'?'MyStyleClass':'MyChangeLanguage').'.php';
require 'ValidationId.php';
class ChangeLanguagePost extends ValidationId{
    private $modal;
    function __construct(){
        $this->modal = new ModelJson($_POST['option']);
        parent::__construct($this->getMyModal(), function($myFile){
            return $this->changeLangStylePost($myFile);
        });
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->changeLangStylePost($this->getMyModal()->getObj()));
        $this->getMyModal()->initViewPost($_POST['option'] === 'ChangeLanguage'?'ChangeLang':'MessageStyle', 'success');
    }
    function getMyModal(){
        return $this->modal;
    }
    function changeLangStylePost($myData){
        $myData['Setting'][$_POST['option'] === 'MyStyle'?'Style':'Language'] = $_POST['id'];
        return $myData;
    }
}
new ChangeLanguagePost();
}else
    header('LOCATION:index');
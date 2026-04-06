<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'ChangeLanguage' || $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'MyStyle'){
require ($_POST['option'] === 'MyStyle'?'MyStyleClass':'MyChangeLanguage').'.php';
require 'ValidationId.php';
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson($_POST['option']);
        $this->validLanguageInput($this->getMyModal());
        $keyId = $_POST['option'] === 'MyStyle'?'Style':'AllNamesLanguage';
        parent::__construct($this->getMyModal(), function($myFile) use($keyId){
            return $this->saveNameLanguage($myFile[$myFile['Setting']['Language']]['AllNamesLanguage'], $keyId, $_POST['id'], $myFile);
        }); 
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->saveNameLanguage($this->getallNames(), $keyId, $_POST['id'], $this->getMyModal()->getObj()));
        $this->getMyModal()->initViewPost('MessageModelEdit', 'success');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new ChangeLanguageEditPost();
}else
    header('LOCATION:index');
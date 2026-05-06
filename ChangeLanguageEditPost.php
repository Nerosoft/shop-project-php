<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'ChangeLanguage' || $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'MyStyle'){
require 'controller/'.($_POST['option'] === 'MyStyle'?'MyStyleClass':'MyChangeLanguage').'.php';
require 'ValidationId.php';
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        $keyId = $_POST['option'] === 'MyStyle'?'Style':'AllNamesLanguage';
        parent::__construct($_POST['option'], function($myFile) use($keyId){
            return $this->saveNameLanguage($myFile[$myFile['Setting']['Language']]['AllNamesLanguage'], $keyId, $_POST['id'], $myFile);
        }); 
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->saveModel($this->saveNameLanguage($this->getallNames(), $keyId, $_POST['id'], $this->getObj()));
        $this->initViewPost('MessageModelEdit', 'success');
    }
}

new ChangeLanguageEditPost();
}else
    header('LOCATION:index');
<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'ChangeLanguage' || $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && $_POST['option'] === 'MyStyle'){
ModelJson::initView($_POST['option'], 'MessageStyleLang', 'success', function(){

class ChangeLanguagePost extends ValidationId{
    function __construct(){
        parent::__construct($_POST['option'], function($myFile){
            return $this->changeLangStylePost($myFile);
        }, 'MessageStyleLang');
        $this->saveModel($this->changeLangStylePost($this->getObj()));
    }
    function changeLangStylePost($myData){
        $myData['Setting'][$_POST['option'] === 'MyStyle'?'Style':'Language'] = $this->keyId;
        return $myData;
    }
}
new ChangeLanguagePost();
});
}else
    header('LOCATION:index');
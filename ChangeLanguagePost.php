<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguagePost extends ValidationId{
    function __construct(){
        parent::__construct('ChangeLanguage');
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            $myData['Setting']['Language'] = $_POST['id'];
            $this->saveModel($myData);
            $view = new MyChangeLanguage('ChangeLang');
        }else{
            $view = new MyChangeLanguage();
            $this->displayErrors();
        }
        include 'ChangeLanguage_view.php';
    }
}
new ChangeLanguagePost();
}else
    header('LOCATION:ChangeLanguage');
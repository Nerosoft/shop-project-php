<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguagePost extends ValidationId{
    function __construct(){
        parent::__construct('ChangeLanguage');
        $myData = $this->getObj();
        $myData['Setting']['Language'] = $_POST['id'];
        $this->saveModel($myData);
        MyChangeLanguage::initMyChangeLanguage('ChangeLang');
    }
}
new ChangeLanguagePost();
}else
    header('LOCATION:view?id=ChangeLanguage');
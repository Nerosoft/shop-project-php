<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->saveModel($this->initErrorChangelanguage2($this->getMyModal(),  $_POST['id']));
        MyChangeLanguage::initMyChangeLanguage('MessageModelEdit');
    }
}

new ChangeLanguageEditPost();
}else
    header('LOCATION:view?id=ChangeLanguage');
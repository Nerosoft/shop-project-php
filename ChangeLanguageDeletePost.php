<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageDeletePost extends ValidationId{
    use ErrorChangelanguageAllNames;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->initErrorChangelanguageAllNames($this->getModel2()['AllNamesLanguage']);
        $this->saveModel($this->deleteLanguage($this->getObj()));
        MyChangeLanguage::initMyChangeLanguage('Delete');
    }
}
new ChangeLanguageDeletePost();
}else
    header('LOCATION:view?id=ChangeLanguage');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageCreatePost extends ValidationId{
    use ErrorChangelanguage;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('ChangeLanguage');
        $newKey = $this->getMyModal()->getRandomId();
        $this->validLanguageInput($this->getMyModal());
        if(!isset($_POST['selectedLanguage']))
            MyChangeLanguage::initMyChangeLanguage('LanguageReq', 'danger');
        else if(!isset($this->getallNames()[$_POST['selectedLanguage']]))
            MyChangeLanguage::initMyChangeLanguage('LanguageInv', 'danger');
        else if(!isset($_POST['Branches']) && !isset($_POST['choices'])){
            $myData = $this->saveNameLanguage($this->getallNames(), 'AllNamesLanguage', $newKey, $this->getMyModal()->getObj());
            $myData[$newKey] = $myData[$_POST['selectedLanguage']];
            $this->getMyModal()->saveModel($myData);
        }else
            parent::__construct($this->getMyModal(), $newKey);
        MyChangeLanguage::initMyChangeLanguage('MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new ChangeLanguageCreatePost();
}else
    header('LOCATION:view?id=ChangeLanguage');
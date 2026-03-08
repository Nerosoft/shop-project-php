<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
class ChangeLanguageCreatePost extends ModelJson{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $newKey = $this->getRandomId();
        $myData = $this->initErrorChangelanguage2($this->getMyModal(),  $newKey);
        $myData[$newKey] = $myData['english'];
        $this->saveModel($myData);
        MyChangeLanguage::initMyChangeLanguage('MessageModelCreate');
    }
}

new ChangeLanguageCreatePost();
}else
    header('LOCATION:view?id=ChangeLanguage');
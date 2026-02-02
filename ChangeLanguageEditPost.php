<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->initErrorChangelanguage($this->getModelPage(), $this->getModel2()['AllNamesLanguage']);
        $this->validChangeLanguage($this);
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            $this->saveLanguageDatabase($_POST['id'], $myData, $this);
            $this->saveModel($myData);
            $view = new MyChangeLanguage('MessageModelEdit');
        }else{
            $view = new MyChangeLanguage();
            $this->displayErrors();
        }
        include 'ChangeLanguage_view.php';
    }
}

new ChangeLanguageEditPost();
}else
    header('LOCATION:ChangeLanguage');
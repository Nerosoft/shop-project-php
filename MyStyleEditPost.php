<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyStyleClass.php';
require 'ValidationId.php';
class MyStyleEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('MyStyle');
        $this->initErrorChangelanguage($this->getModelPage(), $this->getModel2()['AllNamesLanguage']);
        $this->validChangeLanguage($this);
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            $this->saveLanguageDatabase($_POST['id'], $myData, $this, 'Style');
            $this->saveModel($myData);
            $view = new MyStyleClass('MessageModelEdit');
        }else{
            $view = new MyStyleClass();
            $this->displayErrors();
        }
        include 'MyStyle_view.php';
    }
}
new MyStyleEditPost();
}else
    header('LOCATION:MyStyle');
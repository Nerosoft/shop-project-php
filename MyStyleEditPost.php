<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyStyleClass.php';
require 'ValidationId.php';
require 'ErrorChangelanguageAllNames.php';
class MyStyleEditPost extends ValidationId{
    use ErrorSystemlang, ErrorChangelanguageAllNames;
    function __construct(){
        parent::__construct('MyStyle');
        $this->initErrorSystemlang($this->getModelPage());
        $this->initErrorChangelanguageAllNames($this->getModel2()['AllNamesLanguage']);
        $this->validStyleLang($this);
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            $this->saveLanguageDatabase($_POST['id'], $myData, $this, 'Style', 'word');
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
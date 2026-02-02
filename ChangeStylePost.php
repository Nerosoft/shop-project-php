<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyStyleClass.php';
require 'ValidationId.php';
class ChangeStylePost extends ValidationId{
    function __construct(){
        parent::__construct('MyStyle');
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            $myData['Setting']['Style'] = $_POST['id'];
            $this->saveModel($myData);
            $view = new MyStyleClass('MessageStyle');
        }else{
            $view = new MyStyleClass();
            $this->displayErrors();
        }
        include 'MyStyle_view.php';
    }
}
new ChangeStylePost();
}else
    header('LOCATION:MyStyle');
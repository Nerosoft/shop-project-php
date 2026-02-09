<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyStyleClass.php';
require 'ValidationId.php';
class ChangeStylePost extends ValidationId{
    function __construct(){
        parent::__construct('MyStyle');
        $myData = $this->getObj();
        $myData['Setting']['Style'] = $_POST['id'];
        $this->saveModel($myData);
        MyStyleClass::initMyStyleClass('MessageStyle');
    }
}
new ChangeStylePost();
}else
    header('LOCATION:view?id=MyStyle');
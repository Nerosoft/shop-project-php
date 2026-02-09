<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyStyleClass.php';
require 'ValidationId.php';
class MyStyleEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('MyStyle');
        $this->saveModel($this->initErrorChangelanguage2($this->getMyModal(), $_POST['id'], 'Style'));
        MyStyleClass::initMyStyleClass('MessageModelEdit');
    }
}
new MyStyleEditPost();
}else
    header('LOCATION:view?id=MyStyle');
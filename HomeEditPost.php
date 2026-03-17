<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeEditPost extends ValidationId{
    use ErrorsHome;
    function __construct(){
        parent::__construct('Home');
        $this->initErrorsHome2($this->getMyModal());
        $this->saveModel($this->editHome($this->getObj(), $this->getModel2()['AllNamesLanguage']));
        MyHome::initHome('MessageModelEdit');
    }
}
new HomeEditPost();
}else
    header('LOCATION:index');
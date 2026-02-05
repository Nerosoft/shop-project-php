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
        $myData = $this->getObj();
        foreach ($this->getModel2()['AllNamesLanguage'] as $code => $value) 
            $myData[$code]['MyFlexTables'][$_POST['id']] = $_POST['name'];
        $this->saveModel($myData);
        MyHome::initHome('MessageModelEdit');
    }
}
new HomeEditPost();
}else
    header('LOCATION:Home');
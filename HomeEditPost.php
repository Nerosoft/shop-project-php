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
        if(isset($_POST['choices']) && is_array($_POST['choices']) && count($this->getFileByFixedId()['Branches']) > 1 && $this->ValidHome(false, 'MessageModelEdit'))
            MyHome::initHome('IdIsInv', 'danger');
        else{
            $this->saveModel($this->editHome($this->getObj(), $this->getModel2()['AllNamesLanguage']));
            MyHome::initHome('MessageModelEdit');
        }
    }
}
new HomeEditPost();
}else
    header('LOCATION:index');
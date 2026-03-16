<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Home');
        $this->saveModel($this->deleteHome($this->getObj()));
        MyHome::initHome('Delete');
    }
}
new HomeDeletePost();
}else
    header('LOCATION:index');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeDeletePost extends ValidationId{
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Home');
        parent::__construct($this->getMyModal()); 
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->deleteHome($this->getMyModal()->getObj()));
        MyHome::initHome('Delete');
    }
    function getMyModal(){
        return $this->modal;
    }
}
new HomeDeletePost();
}else
    header('LOCATION:index');
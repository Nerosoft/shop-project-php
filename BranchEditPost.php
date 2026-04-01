<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchEditPost extends ValidationId{
    use ErrorBranch;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Branches');
        parent::__construct($this->getMyModal());
        $this->getMyModal()->saveFile($this->initErrorBranch2($this->getMyModal(), $_POST['id']));
        MyBranch::initBranch('MessageModelEdit');
    }
    function getMyModal(){
        return $this->modal;
    }
}
new BranchEditPost();
}else
    header('LOCATION:view?id=Branches');
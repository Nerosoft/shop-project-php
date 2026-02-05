<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchEditPost extends ValidationId{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches');
        $this->saveFile($this->initErrorBranch2($this->getMyModal(), $_POST['id']));
        MyBranch::initBranch('MessageModelEdit');
    }
}
new BranchEditPost();
}else
    header('LOCATION:Branches');
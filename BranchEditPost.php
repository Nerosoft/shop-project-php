<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchEditPost extends ValidationId{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches');
        $this->getMyModal()->saveFile($this->myBranch);
        MyBranch::initBranch('MessageModelEdit');
    }
}
new BranchEditPost();
}else
    header('LOCATION:view?id=Branches');
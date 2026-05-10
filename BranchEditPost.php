<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'controller/Branches.php';
require 'ValidationId.php';
class BranchEditPost extends ValidationId{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches');
        $this->saveMyFile();
        $this->initViewPost('MessageModelEdit', 'success');
    }
}
new BranchEditPost();
}else
    header('LOCATION:view?id=Branches');
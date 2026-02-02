<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchEditPost extends ValidationId{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches');
        $this->initErrorBranch($this->getModelPage());
        $this->ValidBranch($this);
        if($this->isEmptyErrors()){
            $file = $this->getFile();
            $this->saveBranch($_POST['id'], $file);
            $view = new MyBranch('MessageModelEdit');
        }else{
            $view = new MyBranch();
            $this->displayErrors();
        }  
        include 'Branch_view.php';
    }
}
new BranchEditPost();
}else
    header('LOCATION:Branches');
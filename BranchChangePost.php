<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchChangePost extends ValidationId{
    function __construct(){
        parent::__construct('Branches');
        if($this->isEmptyErrors()){
            $this->resetId();
            $view = new MyBranch('SuccessfullyChangeBranch');
        }else{
            $view = new MyBranch();
            $this->displayErrors();
        }  
        include 'Branch_view.php';
    }
}
new BranchChangePost();
}else
    header('LOCATION:Branches');
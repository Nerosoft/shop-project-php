<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchChangePost extends ValidationId{
    function __construct(){
        parent::__construct('Branches');
        $this->resetId();
        MyBranch::initBranch('SuccessfullyChangeBranch');
    }
}
new BranchChangePost();
}else
    header('LOCATION:Branches');
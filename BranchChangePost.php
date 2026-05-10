<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'controller/Branches.php';
require 'ValidationId.php';
class BranchChangePost extends ValidationId{
    function __construct(){
        parent::__construct('Branches');
        $this->resetId();
        $this->initViewPost('SuccessfullyChangeBranch', 'success');
    }
}
new BranchChangePost();
}else
    header('LOCATION:view?id=Branches');
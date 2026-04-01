<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchChangePost extends ValidationId{
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Branches');
        parent::__construct($this->getMyModal());
        $this->getMyModal()->resetId();
        MyBranch::initBranch('SuccessfullyChangeBranch');
    }
    function getMyModal(){
        return $this->modal;
    }
}
new BranchChangePost();
}else
    header('LOCATION:view?id=Branches');
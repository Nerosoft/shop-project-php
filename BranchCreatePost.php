<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
class BranchCreatePost extends ModelJson{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches');
        $keyId = $this->getRandomId();
        $file = $this->initErrorBranch2($this->getMyModal(), $keyId);
        $obj = $this->getFileByFixedId();
        unset($obj['Branches'], $obj['Users'], $obj['State']);
        $file [$keyId] = $obj;
        $this->saveFile($file);
        MyBranch::initBranch('MessageModelCreate');
    }
}

new BranchCreatePost();
}else
    header('LOCATION:Branches');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'MessageError.php';
class BranchCreatePost extends MessageError{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches');
        $this->initErrorBranch($this->getModelPage());
        $this->ValidBranch($this);
        if($this->isEmptyErrors()){
            $file = $this->getFile();
            $keyId = $this->getRandomId();
            $obj = $this->getFileByFixedId();
            unset($obj['Branches'], $obj['Users'], $obj['State']);
            $file [$keyId] = $obj;
            $this->saveBranch($keyId, $file);
            $view = new MyBranch('MessageModelCreate');
        }else{
            $view = new MyBranch();
            $this->displayErrors();
        }  
        include 'Branch_view.php';
    }
}

new BranchCreatePost();
}else
    header('LOCATION:Branches');
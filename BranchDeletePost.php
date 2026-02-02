<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Branches');
        if($this->isEmptyErrors()){
            $file = $this->getFile();
            if(count($file[$this->getFixedId()]['Branches']) === 1)
                unset($file[$this->getFixedId()]['Branches']);
            else
                unset( $file[$this->getFixedId()]['Branches'][$_POST['id']]);
            unset($file[$_POST['id']]);
            $this->saveFile($file);
            $view = new MyBranch('Delete');
        }else{
            $view = new MyBranch();
            $this->displayErrors();
        }  
        include 'Branch_view.php';
    }
}
new BranchDeletePost();
}else
    header('LOCATION:Branches');
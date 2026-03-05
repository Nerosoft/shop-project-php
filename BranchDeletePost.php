<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Branches');
        $file = $this->getFile();
        if(isset($file[$_POST['id']]['Product']))
            foreach ($file[$_POST['id']]['Product'] as $key => $value)
               array_map('unlink', glob('asset/product/'.$key.'.*'));
        unset($file[$this->getFixedId()]['Branches'][$_POST['id']]);
        unset($file[$_POST['id']]);
        $this->saveFile($file);
        MyBranch::initBranch('Delete');
    }
}
new BranchDeletePost();
}else
    header('LOCATION:view?id=Branches');
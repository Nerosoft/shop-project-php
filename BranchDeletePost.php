<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Branches');
        $file = $this->getFile();
        unset($file[$this->getFixedId()]['Branches'][$_POST['id']]);
        unset($file[$_POST['id']]);
        $this->saveFile($file);
        if(is_dir('asset/product/'.$_POST['id'])){
            $dir = opendir('asset/product/'.$_POST['id']);
            while (false !== ($myFile=readdir($dir)))
                if($myFile != '.' && $myFile != '..')
                    unlink('asset/product/'.$_POST['id'].'/'.$myFile);
            closedir($dir);
            rmdir('asset/product/'.$_POST['id']);
        }
        MyBranch::initBranch('Delete');
    }
}
new BranchDeletePost();
}else
    header('LOCATION:view?id=Branches');
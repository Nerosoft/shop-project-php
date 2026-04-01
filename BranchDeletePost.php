<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchDeletePost extends ValidationId{
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Branches');
        parent::__construct($this->getMyModal());
        $file = $this->getMyModal()->getFile();
        unset($file[$this->getMyModal()->getFixedId()]['Branches'][$_POST['id']]);
        unset($file[$_POST['id']]);
        $this->getMyModal()->saveFile($file);
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
    function getMyModal(){
        return $this->modal;
    }
}
new BranchDeletePost();
}else
    header('LOCATION:view?id=Branches');
<?php
include 'auth/SessionAdmin.php';
require 'auth/test_session4.php';
class BranchDeletePost extends ModelJson{
    function __construct(){
        parent::__construct('Branches');
        $file = $this->getFile();
        unset($file[$this->getFixedId()]['Branches'][$this->keyId]);
        unset($file[$this->keyId]);
        $this->saveFile($file);
        if(is_dir('asset/product/'.$this->keyId)){
            $dir = opendir('asset/product/'.$this->keyId);
            while (false !== ($myFile=readdir($dir)))
                if($myFile != '.' && $myFile != '..')
                    unlink('asset/product/'.$this->keyId.'/'.$myFile);
            closedir($dir);
            rmdir('asset/product/'.$this->keyId);
        }
        $this->showMessage($this->getModelPage()['Delete']);
    }
}
new BranchDeletePost();
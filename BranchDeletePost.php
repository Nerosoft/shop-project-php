<?php
include 'auth/SessionPost.php';
class BranchDeletePost extends ValidationId{
    function __construct(){
        parent::__construct(null, null, 'Branches');
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
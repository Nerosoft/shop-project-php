<?php
include 'auth/SessionAdmin.php';
require 'auth/test_session4.php';
class BranchCreatePost extends ModelJson{
    use ErrorBranch;
    function copyImageFolder($arr){
        if(!is_dir('asset/product/'.$this->keyId))
            mkdir('asset/product/'.$this->keyId);
        $dir = opendir('asset/product/'.$_POST['selectedBranch']);
        while (false !== ($myFile=readdir($dir)))
            if($myFile != '.' && $myFile != '..' && isset($arr[pathinfo($myFile, PATHINFO_FILENAME)]))
                copy('asset/product/'.$_POST['selectedBranch'].'/'.$myFile, 'asset/product/'.$this->keyId.'/'.$myFile);
        closedir($dir);
    }
    function __construct(){
        parent::__construct("Branches", null, null, ModelJson::getRandomKey());
        $obj = $this->getFile()[$_POST['selectedBranch']];
        unset($obj['Branches']);
        if(!isset($_POST['Users']) && isset($obj['Users']))
            unset($obj['Users']);
        if(isset($_POST['Product']) && isset($obj['Product']))
            $this->copyImageFolder($obj['Product']);
        else if(isset($obj['Product']))
            unset($obj['Product']);

        //check exist table and user select table
        if(isset($_POST['flextable']) && isset($obj[$obj['AllNamesLanguage']]['MyFlexTables'])){
            foreach ($obj[$obj['AllNamesLanguage']]['MyFlexTables'] as $keyTable => $value)
                if(isset($obj[$keyTable]))
                    $this->copyImageFolder($obj[$keyTable]);
        }//check exist table and delete all table
        else if(isset($obj[$obj['AllNamesLanguage']]['MyFlexTables']))
            foreach ($obj[$obj['AllNamesLanguage']]['MyFlexTables'] as $key => $value){   
                if(isset($obj[$key]))                
                    unset($obj[$key]);
                foreach ($obj[$obj['AllNamesLanguage']]['AllNamesLanguage'] as $keylang => $valuelang){
                    unset($obj[$keylang][$key]);
                    if(isset($obj[$keylang]['MyFlexTables']))
                        unset($obj[$keylang]['MyFlexTables']);
                }
                
            }
        $myBranch = $this->getFile();
        $myBranch[$this->keyId] = $obj;
        $this->saveFile($myBranch);
        $this->showMessage($this->getModelPage()['MessageModelCreate']);
    }
}
new BranchCreatePost();
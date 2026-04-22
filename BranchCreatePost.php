<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchCreatePost extends ValidationId{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches', null);
        $keyId =  array_key_last($this->getBranch());
        $obj = $this->getObj();
        unset($obj['Branches']);
        if(!isset($_POST['Users']) && isset($obj['Users']))
            unset($obj['Users']);
        if(!isset($_POST['Product']) && isset($obj['Product']))
            unset($obj['Product']);
        else if(isset($obj['Product'])){
            mkdir('asset/product/'.$keyId);
            $dir = opendir('asset/product/'.$this->getId());
            while (false !== ($myFile=readdir($dir)))
                if($myFile != '.' && $myFile != '..')
                    copy('asset/product/'.$this->getId().'/'.$myFile, 'asset/product/'.$keyId.'/'.$myFile);
            closedir($dir);
        }
        if(!isset($_POST['flextable']) && isset($obj['english']['MyFlexTables'])){
            foreach ($obj['english']['MyFlexTables'] as $key => $value){   
                if(isset($obj[$key]))                
                    unset($obj[$key]);
                foreach ($obj['english']['AllNamesLanguage'] as $keylang => $valuelang){
                    unset($obj[$keylang][$key]);
                    if(isset($obj[$keylang]['MyFlexTables']))
                        unset($obj[$keylang]['MyFlexTables']);
                }
                
            }
        }
        $myBranch = $this->getFile();
        $myBranch[$keyId] = $obj;
        $this->saveFile($myBranch);
        MyBranch::initBranch('MessageModelCreate');
    }
}

new BranchCreatePost();
}else
    header('LOCATION:view?id=Branches');
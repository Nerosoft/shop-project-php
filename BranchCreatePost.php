<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('Branches', 'MessageModelCreate', 'success', function(){
class BranchCreatePost extends ValidationId{
    use ErrorBranch;
    function copyImageFolder($arr){
        if(!is_dir('asset/product/'.array_key_last($this->getBranch())))
            mkdir('asset/product/'.array_key_last($this->getBranch()));
        $dir = opendir('asset/product/'.$this->getId());
        while (false !== ($myFile=readdir($dir)))
            if($myFile != '.' && $myFile != '..' && isset($arr[pathinfo($myFile, PATHINFO_FILENAME)]))
                copy('asset/product/'.$this->getId().'/'.$myFile, 'asset/product/'.array_key_last($this->getBranch()).'/'.$myFile);
        closedir($dir);
    }
    function __construct(){
        parent::__construct('Branches');
        $keyId =  array_key_last($this->getBranch());
        $obj = $this->getObj();
        unset($obj['Branches']);
        if(!isset($_POST['Users']) && isset($obj['Users']))
            unset($obj['Users']);
        if(isset($_POST['Product']) && isset($obj['Product']))
            $this->copyImageFolder($obj['Product']);
        else if(isset($obj['Product']))
            unset($obj['Product']);

        //check exist table and user select table
        if(isset($_POST['flextable']) && isset($this->getModel2()['MyFlexTables'])){
            foreach ($this->getModel2()['MyFlexTables'] as $keyTable => $value)
                if(isset($this->getObj()[$keyTable]))
                    $this->copyImageFolder($this->getObj()[$keyTable]);
        }//check exist table and delete all table
        else if(isset($this->getModel2()['MyFlexTables']))
            foreach ($this->getModel2()['MyFlexTables'] as $key => $value){   
                if(isset($obj[$key]))                
                    unset($obj[$key]);
                foreach ($this->getModel2()['AllNamesLanguage'] as $keylang => $valuelang){
                    unset($obj[$keylang][$key]);
                    if(isset($obj[$keylang]['MyFlexTables']))
                        unset($obj[$keylang]['MyFlexTables']);
                }
                
            }
        $myBranch = $this->getFile();
        $myBranch[$keyId] = $obj;
        $this->saveFile($myBranch);
    }
}
new BranchCreatePost();
});
}else
    header('LOCATION:view?id=Branches');
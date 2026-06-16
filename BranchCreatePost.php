<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('Branches', 'MessageModelCreate', 'success', function(){
class BranchCreatePost extends ValidationId{
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
        parent::__construct('Branches');
        $obj = $this->getFile()[$_POST['selectedBranch']];
        unset($obj['Branches']);
        if(!isset($_POST['Users']) && isset($obj['Users']))
            unset($obj['Users']);
        if(isset($_POST['Product']) && isset($obj['Product']))
            $this->copyImageFolder($obj['Product']);
        else if(isset($obj['Product']))
            unset($obj['Product']);

        //check exist table and user select table
        if(isset($_POST['flextable']) && isset($obj[$obj['Setting']['AllNamesLanguage']]['MyFlexTables'])){
            foreach ($obj[$obj['Setting']['AllNamesLanguage']]['MyFlexTables'] as $keyTable => $value)
                if(isset($obj[$keyTable]))
                    $this->copyImageFolder($obj[$keyTable]);
        }//check exist table and delete all table
        else if(isset($obj[$obj['Setting']['AllNamesLanguage']]['MyFlexTables']))
            foreach ($obj[$obj['Setting']['AllNamesLanguage']]['MyFlexTables'] as $key => $value){   
                if(isset($obj[$key]))                
                    unset($obj[$key]);
                foreach ($obj[$obj['Setting']['AllNamesLanguage']]['AllNamesLanguage'] as $keylang => $valuelang){
                    unset($obj[$keylang][$key]);
                    if(isset($obj[$keylang]['MyFlexTables']))
                        unset($obj[$keylang]['MyFlexTables']);
                }
                
            }
        $myBranch = $this->getFile();
        $myBranch[$this->keyId] = $obj;
        $this->saveFile($myBranch);
    }
}
new BranchCreatePost();
});
}else
    header('LOCATION:view?id=Branches');
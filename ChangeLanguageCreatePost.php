<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
class ChangeLanguageCreatePost extends ModelJson{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $newKey = $this->getRandomId();
        if(isset($_POST['Branches']) && $_POST['Branches'] === 'all' && count($this->getFileByFixedId()['Branches']) > 1 || isset($_POST['choices']) && count($this->getFileByFixedId()['Branches']) > 1 && $this->validBranchKeys()){
            $this->validLanguageInput($this->getMyModal());
            $file = $this->getFile();
            foreach (isset($_POST['Branches']) ? $this->getFileByFixedId()['Branches'] : $_POST['choices'] as $keyBranch => $value) {
                $file[$keyBranch] = $this->saveNameLanguage($file[$keyBranch][$file[$keyBranch]['Setting']['Language']]['AllNamesLanguage'], 'AllNamesLanguage', $newKey, $file[$keyBranch]);
                $lang = $this->getObj()['english'];
                //reset all name language 
                $lang['AllNamesLanguage'] = $file[$keyBranch][$file[$keyBranch]['Setting']['Language']]['AllNamesLanguage'];
                //chick if exist flex table and delete
                if(isset($lang['MyFlexTables']))
                    foreach ($lang['MyFlexTables'] as $key => $value)
                        unset($lang[$key]);
                //check if exist flex table inside branch
                if(isset($file[$keyBranch][$file[$keyBranch]['Setting']['Language']]['MyFlexTables'])){
                    $lang['MyFlexTables'] = $file[$keyBranch][$file[$keyBranch]['Setting']['Language']]['MyFlexTables'];
                    foreach ($lang['MyFlexTables'] as $keyFlex => $value)
                        $lang[$keyFlex] = $file[$keyBranch][$file[$keyBranch]['Setting']['Language']][$keyFlex];
                }
                //add lang inside branch
                $file[$keyBranch][$newKey] = $lang;
            }
            //save file
            $this->saveFile($file);
        }else{
            $myData = $this->initErrorChangelanguage2($this->getMyModal(),  $newKey);
            $myData[$newKey] = $myData['english'];
            $this->saveModel($myData);
        }
        MyChangeLanguage::initMyChangeLanguage('MessageModelCreate');
    }
}

new ChangeLanguageCreatePost();
}else
    header('LOCATION:view?id=ChangeLanguage');
<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('ChangeLanguage', 'MessageModelCreate', 'success', function(){
class ChangeLanguageCreatePost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        $keyId = $this->getRandomId();
        parent::__construct('ChangeLanguage', function ($myFile)use($keyId){
            $myLanguage = $this->getObj()[$_POST['selectedLanguage']];
            if(isset($myLanguage['MyFlexTables']))
                foreach ($myLanguage['MyFlexTables'] as $keyFlexTable => $value)
                    unset($myLanguage[$keyFlexTable]);
            $myFile = $this->saveNameLanguage($myFile[$myFile['Setting']['Language']]['AllNamesLanguage'], 'AllNamesLanguage', $keyId, $myFile);
            $lang = $myLanguage;
            //reset all name language 
            $lang['AllNamesLanguage'] = $myFile[$myFile['Setting']['Language']]['AllNamesLanguage'];
            //check if exist flex table inside branch
            if(isset($myFile[$myFile['Setting']['Language']]['MyFlexTables'])){
                $lang['MyFlexTables'] = $myFile[$myFile['Setting']['Language']]['MyFlexTables'];
                foreach ($lang['MyFlexTables'] as $keyFlex => $value)
                    $lang[$keyFlex] = $myFile[$myFile['Setting']['Language']][$keyFlex];
            }
            //add lang inside branch
            $myFile[$keyId] = $lang;
            return $myFile;
        }, 'MessageModelCreate');
        $myData = $this->saveNameLanguage($this->getallNames(), 'AllNamesLanguage', $keyId, $this->getObj());
        $myData[$keyId] = $myData[$_POST['selectedLanguage']];
        $this->saveModel($myData);
        
    }
}
new ChangeLanguageCreatePost();
});
}else
    header('LOCATION:view?id=ChangeLanguage');
<?php
include 'auth/SessionAdmin.php';
class ChangeLanguageCreatePost extends ModelJson{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage', function ($myFile){
            $myLanguage = $this->getObj()[$_POST['selectedLanguage']];
            if(isset($myLanguage['MyFlexTables']))
                foreach ($myLanguage['MyFlexTables'] as $keyFlexTable => $value)
                    unset($myLanguage[$keyFlexTable]);
            $myFile = $this->saveNameLanguage($myFile[$myFile['AllNamesLanguage']]['AllNamesLanguage'], 'AllNamesLanguage', $myFile);
            $lang = $myLanguage;
            //reset all name language 
            $lang['AllNamesLanguage'] = $myFile[$myFile['AllNamesLanguage']]['AllNamesLanguage'];
            //check if exist flex table inside branch
            if(isset($myFile[$myFile['AllNamesLanguage']]['MyFlexTables'])){
                $lang['MyFlexTables'] = $myFile[$myFile['AllNamesLanguage']]['MyFlexTables'];
                foreach ($lang['MyFlexTables'] as $keyFlex => $value)
                    $lang[$keyFlex] = $myFile[$myFile['AllNamesLanguage']][$keyFlex];
            }
            //add lang inside branch
            $myFile[$this->keyId] = $lang;
            return $myFile;
        }, 'MessageModelCreate', ModelJson::getRandomKey());
        $myData = $this->saveNameLanguage($this->getallNames(), 'AllNamesLanguage', $this->getObj());
        $myData[$this->keyId] = $myData[$_POST['selectedLanguage']];
        $this->saveModel($myData);
        $this->showMessage($this->getModelPage()['MessageModelCreate']);
    }
}
new ChangeLanguageCreatePost();
<?php
include 'auth/SessionPost.php';
class ChangeLanguageCreatePost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct(function ($myFile){
            $myLanguage = $this->getObj()[$_POST['selectedLanguage']];
            if(isset($myLanguage['MyFlexTables']))
                foreach ($myLanguage['MyFlexTables'] as $keyFlexTable => $value)
                    unset($myLanguage[$keyFlexTable]);
            $myFile = $this->saveNameLanguage($myFile[$myFile['Setting']['AllNamesLanguage']]['AllNamesLanguage'], 'AllNamesLanguage', $myFile);
            $lang = $myLanguage;
            //reset all name language 
            $lang['AllNamesLanguage'] = $myFile[$myFile['Setting']['AllNamesLanguage']]['AllNamesLanguage'];
            //check if exist flex table inside branch
            if(isset($myFile[$myFile['Setting']['AllNamesLanguage']]['MyFlexTables'])){
                $lang['MyFlexTables'] = $myFile[$myFile['Setting']['AllNamesLanguage']]['MyFlexTables'];
                foreach ($lang['MyFlexTables'] as $keyFlex => $value)
                    $lang[$keyFlex] = $myFile[$myFile['Setting']['AllNamesLanguage']][$keyFlex];
            }
            //add lang inside branch
            $myFile[$this->keyId] = $lang;
            return $myFile;
        }, 'MessageModelCreate');
        $myData = $this->saveNameLanguage($this->getallNames(), 'AllNamesLanguage', $this->getObj());
        $myData[$this->keyId] = $myData[$_POST['selectedLanguage']];
        $this->saveModel($myData);
        $this->showMessage($this->getModelPage()['MessageModelCreate']);
    }
}
new ChangeLanguageCreatePost();
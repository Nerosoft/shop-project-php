<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageCreatePost extends ValidationId{
    use ErrorChangelanguage;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('ChangeLanguage');
        $keyId = $this->getMyModal()->getRandomId();
        $this->validLanguageInput($this->getMyModal());
        if(!isset($_POST['selectedLanguage']))
            MyChangeLanguage::initMyChangeLanguage('LanguageReq', 'danger');
        else if(!isset($this->getallNames()[$_POST['selectedLanguage']]))
            MyChangeLanguage::initMyChangeLanguage('LanguageInv', 'danger');
        else if(!isset($_POST['Branches']) && !isset($_POST['choices'])){
            $myData = $this->saveNameLanguage($this->getallNames(), 'AllNamesLanguage', $keyId, $this->getMyModal()->getObj());
            $myData[$keyId] = $myData[$_POST['selectedLanguage']];
            $this->getMyModal()->saveModel($myData);
        }else{
            $myLanguage = $this->getMyModal()->getObj()[$_POST['selectedLanguage']];
            //chick if exist flex table and delete
            if(isset($myLanguage['MyFlexTables']))
                foreach ($myLanguage['MyFlexTables'] as $keyFlexTable => $value)
                    unset($myLanguage[$keyFlexTable]);
            parent::__construct($this->getMyModal(), function ($myFile)use($keyId, $myLanguage){
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
            });
        }
        MyChangeLanguage::initMyChangeLanguage('MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new ChangeLanguageCreatePost();
}else
    header('LOCATION:view?id=ChangeLanguage');
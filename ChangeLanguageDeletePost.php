<?php
include 'auth/SessionAdmin.php';
require 'auth/test_session4.php';
class ChangeLanguageDeletePost extends ModelJson{
    function __construct(){
        parent::__construct('ChangeLanguage', function($myFile){
            return $this->deleteLanguage($myFile);
        }, 'Delete');
        $this->saveModel($this->deleteLanguage($this->getObj()));
        $this->showMessage($this->getModelPage()['Delete']);
    }
    function deleteLanguage($myData){
        //delete language
        unset($myData[$this->keyId]);
        //check if branch active language
        if($myData['AllNamesLanguage'] === $this->keyId)
            $myData['AllNamesLanguage'] = 'english';
        foreach ($myData[$myData['AllNamesLanguage']]['AllNamesLanguage'] as $key=>$value)
            //delete name language inside AllNamesLanguage inside my language
            if($key !== $this->keyId)
                unset($myData[$key]['AllNamesLanguage'][$this->keyId]);
        return $myData;
    }
}
new ChangeLanguageDeletePost();
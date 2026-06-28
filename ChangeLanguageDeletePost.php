<?php
include 'auth/SessionAdmin.php';
ModelJson::initView('ChangeLanguage', 'Delete', 'success', function(){
class ChangeLanguageDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('ChangeLanguage', function($myFile){
            return $this->deleteLanguage($myFile);
        }, 'Delete');
        $this->saveModel($this->deleteLanguage($this->getObj()));
    }
    function deleteLanguage($myData){
        //delete language
        unset($myData[$this->keyId]);
        //check if branch active language
        if($myData['Setting']['AllNamesLanguage'] === $this->keyId)
            $myData['Setting']['AllNamesLanguage'] = 'english';
        foreach ($myData[$myData['Setting']['AllNamesLanguage']]['AllNamesLanguage'] as $key=>$value)
            //delete name language inside AllNamesLanguage inside my language
            if($key !== $this->keyId)
                unset($myData[$key]['AllNamesLanguage'][$this->keyId]);
        return $myData;
    }
}
new ChangeLanguageDeletePost();
});
<?php
include 'auth/SessionAdmin.php';
require 'auth/test_session4.php';
class ChangeLanguagePost extends ModelJson{
    function __construct(){
        parent::__construct(null, function($myFile){
            return $this->changeLangStylePost($myFile);
        }, 'MessageStyleLang');
        $this->saveModel($this->changeLangStylePost($this->getObj()));
        $this->showMessage($_POST['state'] === 'Style'?$this->getModelPage()['MessageStyleLang2']:$this->getModelPage()['MessageStyleLang']);
    }
    function changeLangStylePost($myData){
        $myData[$_POST['state']] = $this->keyId;
        return $myData;
    }
}
new ChangeLanguagePost();
<?php
include 'auth/SessionPost.php';
class ChangeLanguagePost extends ValidationId{
    function __construct(){
        parent::__construct(ModelJson::getBackPage(), function($myFile){
            return $this->changeLangStylePost($myFile);
        }, 'MessageStyleLang');
        $this->saveModel($this->changeLangStylePost($this->getObj()));
        $this->showMessage($_POST['state'] === 'Style'?$this->getModelPage()['MessageStyleLang2']:$this->getModelPage()['MessageStyleLang']);
    }
    function changeLangStylePost($myData){
        $myData['Setting'][$_POST['state']] = $this->keyId;
        return $myData;
    }
}
new ChangeLanguagePost();
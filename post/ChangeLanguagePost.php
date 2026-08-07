<?php
// require 'auth/test_session4.php';
class ChangeLanguagePost extends ModelJson{
    function __construct(){
        parent::__construct(null, 'MessageStyleLang');
    }
    function getView(){
        $this->saveModel($this->changeLangStylePost($this->getObj()));
    }
    function showMessagePost(){
        $this->showMessage($_POST['state'] === 'Style'?$this->getModelPage()['MessageStyleLang2']:$this->getModelPage()['MessageStyleLang']);
    }
}
$view = new ChangeLanguagePost();
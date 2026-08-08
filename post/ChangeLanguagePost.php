<?php
// require 'auth/test_session4.php';
class ChangeLanguagePost extends ModelJson{
    function __construct(){
        parent::__construct(null, $_POST['state'] === 'Style'?'MessageStyleLang2':'MessageStyleLang');
    }
    function getView(){
        $this->saveModel($this->changeLangStylePost($this->getObj()));
    }
}
$view = new ChangeLanguagePost();
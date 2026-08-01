<?php
// require 'auth/test_session4.php';
class ChangeLanguageDeletePost extends ModelJson{
    function __construct(){
        parent::__construct('ChangeLanguage', 'Delete');
    }
    function getView(){
        $this->saveModel($this->deleteLanguage($this->getObj()));
        $this->showMessage($this->getModelPage()['Delete']);
    }

}
$view = new ChangeLanguageDeletePost();
<?php
// require 'auth/test_session4.php';
class ChangeLanguageCreatePost extends ModelJson{
    function __construct(){
        parent::__construct('ChangeLanguage', 'MessageModelCreate');
    }
    function getView(){
        $myData = $this->saveNameLanguage($this->getallNames(), 'AllNamesLanguage', $this->getObj());
        $myData[$this->keyId] = $myData[$_POST['selectedLanguage']];
        $this->saveModel($myData);
    }
}
$view = new ChangeLanguageCreatePost();
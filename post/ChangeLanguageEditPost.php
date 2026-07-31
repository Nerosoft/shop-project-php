<?php
// require 'auth/test_session4.php';
class ChangeLanguageEditPost extends ModelJson{
    function __construct(){
        parent::__construct(null, function($myFile){
        return $this->saveNameLanguage($myFile[$myFile['AllNamesLanguage']]['AllNamesLanguage'], $this->getBackPage() === 'MyStyle'?'Style':'AllNamesLanguage', $myFile);
        }, 'MessageModelEdit'); 
    }
    function getView(){
        $this->saveModel($this->saveNameLanguage($this->getallNames(), $this->getBackPage() === 'MyStyle'?'Style':'AllNamesLanguage', $this->getObj()));
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
}
$view = new ChangeLanguageEditPost();
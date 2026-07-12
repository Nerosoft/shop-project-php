<?php
include 'auth/SessionAdmin.php';
class ChangeLanguageEditPost extends ModelJson{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct(null, function($myFile){
            return $this->saveNameLanguage($myFile[$myFile['AllNamesLanguage']]['AllNamesLanguage'], $this->getBackPage() === 'MyStyle'?'Style':'AllNamesLanguage', $myFile);
        }, 'MessageModelEdit'); 
        $this->saveModel($this->saveNameLanguage($this->getallNames(), $this->getBackPage() === 'MyStyle'?'Style':'AllNamesLanguage', $this->getObj()));
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
}
new ChangeLanguageEditPost();
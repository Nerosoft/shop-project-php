<?php
include 'auth/SessionPost.php';
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct(null, function($myFile){
            return $this->saveNameLanguage($myFile[$myFile['Setting']['AllNamesLanguage']]['AllNamesLanguage'], $this->getBackPage() === 'MyStyle'?'Style':'AllNamesLanguage', $myFile);
        }, 'MessageModelEdit'); 
        $this->saveModel($this->saveNameLanguage($this->getallNames(), $this->getBackPage() === 'MyStyle'?'Style':'AllNamesLanguage', $this->getObj()));
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
}
new ChangeLanguageEditPost();
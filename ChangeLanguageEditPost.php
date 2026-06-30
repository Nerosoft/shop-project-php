<?php
include 'auth/SessionPost.php';
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct(ModelJson::getBackPage(), function($myFile){
            return $this->saveNameLanguage($myFile[$myFile['Setting']['AllNamesLanguage']]['AllNamesLanguage'], ModelJson::getBackPage() === 'MyStyle'?'Style':'AllNamesLanguage', $myFile);
        }, 'MessageModelEdit'); 
        $this->saveModel($this->saveNameLanguage($this->getallNames(), ModelJson::getBackPage() === 'MyStyle'?'Style':'AllNamesLanguage', $this->getObj()));
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
}
new ChangeLanguageEditPost();
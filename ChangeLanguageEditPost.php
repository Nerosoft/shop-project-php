<?php
include 'auth/SessionAdmin.php';
ModelJson::initView($_POST['option'], 'MessageModelEdit', 'success', function(){
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct($_POST['option'], function($myFile){
            return $this->saveNameLanguage($myFile[$myFile['Setting']['AllNamesLanguage']]['AllNamesLanguage'], $_POST['option'] === 'MyStyle'?'Style':'AllNamesLanguage', $myFile);
        }, 'MessageModelEdit'); 
        $this->saveModel($this->saveNameLanguage($this->getallNames(), $_POST['option'] === 'MyStyle'?'Style':'AllNamesLanguage', $this->getObj()));
    }
}
new ChangeLanguageEditPost();
});
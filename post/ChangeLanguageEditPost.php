<?php
// require 'auth/test_session4.php';
class ChangeLanguageEditPost extends ModelJson{
    function __construct(){
        parent::__construct(null, 'MessageModelEdit'); 
    }
    function getView(){
        $this->saveModel($this->saveNameLanguage($this->getallNames(), $this->getUrlName2() === 'MyStyle'?'Style':'AllNamesLanguage', $this->getObj()));
    }
}
$view = new ChangeLanguageEditPost();
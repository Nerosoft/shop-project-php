<?php
// require 'auth/test_session4.php';
class HomeEditPost extends ModelJson{
    function __construct(){
        parent::__construct('Home', 'MessageModelEdit'); 
    }
    function getView(){
        $this->saveModel($this->editHome($this->getObj(), $this->getModel2()['AllNamesLanguage']));
    }
    function showMessagePost(){
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
}
$view = new HomeEditPost();
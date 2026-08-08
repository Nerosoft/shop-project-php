<?php
// require 'auth/test_session4.php';
 class HomeCreatePost extends ModelJson{
    function __construct(){
        parent::__construct('Home', 'MessageModelCreate'); 
    }
    function getView(){
        $this->saveModel($this->saveFelxTable($this->getModel2()['AllNamesLanguage'], $this->getObj()));
        $this->showMessage('MyFlexTables?id='.$this->keyId);
    }
}
$view = new HomeCreatePost();


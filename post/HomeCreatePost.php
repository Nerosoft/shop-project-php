<?php
// require 'auth/test_session4.php';
 class HomeCreatePost extends ModelJson{
    public $keysInput = array();
    function __construct(){
        
        parent::__construct('Home', 'MessageModelCreate'); 
    }
    function getView(){
        $this->saveModel($this->saveFelxTable($this->getModel2()['AllNamesLanguage'], $this->getObj()));
        $this->showMessage($this->getModelPage()['MessageModelCreate']);
    }
}
$view = new HomeCreatePost();


<?php
// require 'auth/test_session4.php';
class HomeDeletePost extends ModelJson{
    function __construct(){
        parent::__construct('Home', 'Delete'); 
    }
    function getView(){
        $this->saveModel($this->deleteHome($this->getObj(), $this->getId()));
        $this->showMessage($this->getModelPage()['Delete']);
    }
}
$view = new HomeDeletePost();
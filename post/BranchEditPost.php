<?php
// require 'auth/test_session4.php';
class BranchEditPost extends ModelJson{
    function __construct(){
        parent::__construct('Branches');
    }
    function getView(){
        $this->saveMyFile();
    }
    function showMessagePost(){
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
}
$view = new BranchEditPost();
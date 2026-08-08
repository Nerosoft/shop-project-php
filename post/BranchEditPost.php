<?php
// require 'auth/test_session4.php';
class BranchEditPost extends ModelJson{
    function __construct(){
        parent::__construct('Branches', 'MessageModelEdit');
    }
    function getView(){
        $this->saveMyFile();
    }
}
$view = new BranchEditPost();
<?php
// require 'auth/test_session4.php';
class BranchChangePost extends ModelJson{
    function __construct(){
        parent::__construct(null, 'SuccessfullyChangeBranch');
    }
    function getView(){
        $_SESSION['userId'] = $this->keyId;
    }
}
$view = new BranchChangePost();
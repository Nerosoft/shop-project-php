<?php
include 'auth/SessionAdmin.php';
require 'auth/test_session4.php';
class BranchChangePost extends ModelJson{
    function __construct(){
        parent::__construct();
        $_SESSION['userId'] = $this->keyId;
        $this->showMessage($this->getModelPage()['SuccessfullyChangeBranch']);
    }
}
new BranchChangePost();
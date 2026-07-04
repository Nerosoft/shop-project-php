<?php
include 'auth/SessionPost.php';
class BranchChangePost extends ValidationId{
    function __construct(){
        parent::__construct();
        $_SESSION['userId'] = $this->keyId;
        $this->showMessage($this->getModelPage()['SuccessfullyChangeBranch']);
    }
}
new BranchChangePost();
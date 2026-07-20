<?php
include 'auth/SessionAdmin.php';
require 'auth/test_session4.php';
class BranchEditPost extends ModelJson{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches');
        $this->saveMyFile();
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
}
new BranchEditPost();
<?php
include 'auth/SessionAdmin.php';
class BranchEditPost extends ModelJson{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches');
        $this->saveMyFile();
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
}
new BranchEditPost();
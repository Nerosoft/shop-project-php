<?php
include 'auth/SessionPost.php';
class BranchEditPost extends ValidationId{
    use ErrorBranch;
    function __construct(){
        parent::__construct(null, null, 'Branches');
        $this->saveMyFile();
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
}
new BranchEditPost();
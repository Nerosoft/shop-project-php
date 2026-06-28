<?php
include 'auth/SessionAdmin.php';
ModelJson::initView('Branches', 'MessageModelEdit', 'success', function(){
class BranchEditPost extends ValidationId{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches');
        $this->saveMyFile();
    }
}
new BranchEditPost();
});
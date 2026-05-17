<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
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
}else
    header('LOCATION:view?id=Branches');
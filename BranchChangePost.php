<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option'])){
ModelJson::initView('Branches', 'SuccessfullyChangeBranch', 'success', function(){
class BranchChangePost extends ValidationId{
    function __construct(){
        parent::__construct('Branches');
        $_SESSION['userId'] = $this->keyId;
    }
}
new BranchChangePost();
});
}else
    header('LOCATION:view?id=Branches');
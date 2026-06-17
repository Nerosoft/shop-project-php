<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option'])){
ModelJson::initView(($_POST['option'] === 'Home' ||
            $_POST['option'] === 'HomeCreatePost' ||
            $_POST['option'] === 'Branches' ||
            $_POST['option'] === 'ChangeLanguage' ||
            $_POST['option'] === 'Users' ||
            $_POST['option'] === 'Product' ||
            $_POST['option'] === 'SystemLang' ||
            $_POST['option'] === 'MyStyle'? $_POST['option']:'MyFlexTablesView'), 'SuccessfullyChangeBranch', 'success', function(){
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
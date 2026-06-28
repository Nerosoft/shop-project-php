<?php
include 'auth/SessionAuth.php';
ModelJson::initView($_POST['option'], $_POST['state'] === 'branch' || $_POST['state'] === 'branch2'?'SuccessfullyChangeBranch':($_POST['state'] === 'AllNamesLanguage'?'ChangeLang':'ChangeStyleMessage'), 'success', function(){
    class ChangeLangPost extends ValidationId{
        function __construct(){  
            parent::__construct($_POST['option']);
            if($_POST['state'] === 'branch' || $_POST['state'] === 'branch2'){
                setcookie('branchId', $this->keyId, time()+2628000);
                $_COOKIE['branchId'] = $this->keyId;
                $_POST['superId'] =  $this->keyId;
            }
            else{
                setcookie($this->getId().$_POST['state'], $this->keyId, time()+2628000);
                $_COOKIE[$this->getId().$_POST['state']] = $this->keyId;
            }
            
        }
    }
    new ChangeLangPost();
});
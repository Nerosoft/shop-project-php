<?php
include 'auth/SessionPost.php';
class ChangeLangPost extends ValidationId{
    function __construct(){  
        parent::__construct();
        if($_POST['state'] === 'branch' || $_POST['state'] === 'branch2'){
            setcookie('branchId', $this->keyId, time()+2628000);
            $_COOKIE['branchId'] = $this->keyId;
            $_POST['superId'] =  $this->keyId;
        }
        else{
            setcookie($this->getId().$_POST['state'], $this->keyId, time()+2628000);
            $_COOKIE[$this->getId().$_POST['state']] = $this->keyId;
        }
        $this->showMessage($this->getModelPage()[$_POST['state'] === 'branch' || $_POST['state'] === 'branch2'?'SuccessfullyChangeBranch':($_POST['state'] === 'AllNamesLanguage'?'ChangeLang':'ChangeStyleMessage')]);
    }
}
new ChangeLangPost();
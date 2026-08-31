<?php
// require 'auth/test_session3.php';
class ChangeLangPost extends ModelJson{
    function __construct(){  
        parent::__construct(null, isset($_POST['state']) && $_POST['state'] === 'branch' || isset($_POST['state']) && $_POST['state'] === 'branch2'?'SuccessfullyChangeBranch':(isset($_POST['state']) && $_POST['state'] === 'AllNamesLanguage'?'MessageStyleLang':'MessageStyleLang2'));
    }
    function getView(){
        //importaint page don change super id refresh page if change branch to rest super id
        if($_POST['state'] === 'branch' || $_POST['state'] === 'branch2'){
            setcookie('branchId', $this->keyId, time()+2628000);
            $_COOKIE['branchId'] = $this->keyId;
            $this->MyIdDb = $this->keyId;
            $this->Language = $_COOKIE[$this->getId().'AllNamesLanguage']??$this->getObj()['AllNamesLanguage'];
        }
        else{
            setcookie($this->getId().$_POST['state'], $this->keyId, time()+2628000);
            $_COOKIE[$this->getId().$_POST['state']] = $this->keyId;
        }
    }
}
$view = new ChangeLangPost();
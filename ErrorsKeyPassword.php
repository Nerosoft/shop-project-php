<?php
trait ErrorsKeyPassword{
    private $RequiredKeyPassword;
    private $InvalidKeyPassword;
    public function initErrorsKeyPassword($error){
        $this->RequiredKeyPassword = $error['RequiredKeyPassword'];
        $this->InvalidKeyPassword = $error['InvalidKeyPassword'];
    }
    function initErrorsKeyPassword2($modal, $keyId){
        $this->validKeyPassword($modal);
        $myData = $modal->getObj();
        $myData['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
        $modal->saveModel($myData);
        
    }
    function validKeyPassword($modal){
        $this->initErrorsKeyPassword($modal->getModelPage());
        if(!isset($_POST['Key']) || $_POST['Key'] === '')
            ModelJson::initViewPost($this->getRequiredKeyPassword(), 'danger');
        else if(strlen($_POST['Key']) < 8)
            ModelJson::initViewPost($this->getInvalidKeyPassword(), 'danger');
    }
    function getRequiredKeyPassword(){
        return $this->RequiredKeyPassword;
    }
    function getInvalidKeyPassword(){
        return $this->InvalidKeyPassword;
    }
}
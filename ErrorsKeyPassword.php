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
       if(isset($modal->getObj()['Users'][$keyId]['Email']) && $_POST['Email'] === $modal->getObj()['Users'][$keyId]['Email'] ||
            //make edit create account and check exist email
            isset($modal->getObj()['Users']) && !in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $modal->getObj()['Users']))||
            //check users empty
            !isset($modal->getObj()['Users'])){
                $myData = $modal->getObj();
                $myData['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                $modal->saveModel($myData);
            //show message email exist
        }else
            $modal->initViewPost($modal->getModelPage()['EmailExist']);
        
    }

    function validKeyPassword($modal){
        $this->initErrorsKeyPassword($modal->getModelPage());
        if(!isset($_POST['Key']) || $_POST['Key'] === '')
           $modal->initViewPost($this->getRequiredKeyPassword(), 'danger');
        else if(strlen($_POST['Key']) < 8)
           $modal->initViewPost($this->getInvalidKeyPassword(), 'danger');
    }
    function createEditAccountBranch(){

    }
    function getRequiredKeyPassword(){
        return $this->RequiredKeyPassword;
    }
    function getInvalidKeyPassword(){
        return $this->InvalidKeyPassword;
    }
}
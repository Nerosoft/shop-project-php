<?php
trait ErrorsKeyPassword{
    private $RequiredKeyPassword;
    private $InvalidKeyPassword;
    public function initErrorsKeyPassword($error){
        $this->RequiredKeyPassword = $error['RequiredKeyPassword'];
        $this->InvalidKeyPassword = $error['InvalidKeyPassword'];
    }
    function initErrorsKeyPassword2($modal, $keyId, $myData){
       if(isset($modal->getObj()['Users'][$keyId]['Email']) && $_POST['Email'] === $modal->getObj()['Users'][$keyId]['Email'] ||
            //make edit create account and check exist email
            isset($modal->getObj()['Users']) && !in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $modal->getObj()['Users']))||
            //check users empty
            !isset($modal->getObj()['Users'])){
                // $myData = $modal->getObj();
                $myData['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                return $myData;
            //show message email exist
        }else
            $modal->initViewPost($modal->getModelPage()['EmailExist']);
        
    }
    function getRequiredKeyPassword(){
        return $this->RequiredKeyPassword;
    }
    function getInvalidKeyPassword(){
        return $this->InvalidKeyPassword;
    }
}
<?php
trait ErrorsEmailPassword{
    private $RequiredEmail;
    private $InvalidEmail;
    private $RequiredPassword;
    private $InvalidPassword;
    private $RequiredKeyPassword;
    private $InvalidKeyPassword;
    
    public function initErrorsEmailPassword($error){
        $this->RequiredEmail = $error['RequiredEmail'];
        $this->InvalidEmail = $error['InvalidEmail'];
        $this->RequiredPassword = $error['RequiredPassword'];
        $this->InvalidPassword = $error['InvalidPassword'];
        if($this->getSCRIPTFILENAME() !== 'LoginPost'){
            $this->RequiredKeyPassword = $error['RequiredKeyPassword'];
            $this->InvalidKeyPassword = $error['InvalidKeyPassword'];
        }
    }
    //setup project no valid email exist
    function initErrorsEmailPassword3($modal){
        $this->initErrorsEmailPassword($modal->getModelPage());
        if(!isset($_POST['Email']) || $_POST['Email'] === '')
            $modal->initViewPost($this->getRequiredEmail());
        else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
            $modal->initViewPost($this->getInvalidEmail());
        else if(!isset($_POST['Password']) || $_POST['Password'] === '')
            $modal->initViewPost($this->getRequiredPassword());
        else if(strlen($_POST['Password']) < 8)
            $modal->initViewPost($this->getInvalidPassword());
        else if($modal->getSCRIPTFILENAME() !== 'LoginPost' && !isset($_POST['Key']) || $modal->getSCRIPTFILENAME() !== 'LoginPost' && $_POST['Key'] === '')
                $modal->initViewPost($this->getRequiredKeyPassword(), 'danger');
        else if($modal->getSCRIPTFILENAME() !== 'LoginPost' && strlen($_POST['Key']) < 8)
            $modal->initViewPost($this->getInvalidKeyPassword(), 'danger');
    }
    function initErrorsKeyPassword2($modal, $keyId, $myData){
       if(isset($myData['Users'][$keyId]['Email']) && $_POST['Email'] === $myData['Users'][$keyId]['Email'] ||
            //make edit create account and check exist email
            isset($myData['Users']) && !in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $myData['Users']))||
            //check users empty
            !isset($myData['Users'])){
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
    function getRequiredEmail(){
        return $this->RequiredEmail;
    }
    function getInvalidEmail(){
        return $this->InvalidEmail;
    }
    function getRequiredPassword(){
        return $this->RequiredPassword;
    }
    function getInvalidPassword(){
        return $this->InvalidPassword;
    }
    function loginAdmin($userId, $staticId){
        $_SESSION['userId'] = $userId;
        $_SESSION['staticId'] = $staticId;
        header('LOCATION:index');
        exit;
    }
}
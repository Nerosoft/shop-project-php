<?php
trait ErrorsEmailPassword{
    private $RequiredEmail;
    private $InvalidEmail;
    private $RequiredPassword;
    private $InvalidPassword;
    private $RequiredKeyPassword;
    private $InvalidKeyPassword;
    
    public function initErrorsEmailPassword(){
        $this->RequiredEmail = $this->getModelPage()['RequiredEmail'];
        $this->InvalidEmail = $this->getModelPage()['InvalidEmail'];
        $this->RequiredPassword = $this->getModelPage()['RequiredPassword'];
        $this->InvalidPassword = $this->getModelPage()['InvalidPassword'];
        if(ModelJson::getFileName() !== 'LoginPost'){
            $this->RequiredKeyPassword = $this->getModelPage()['RequiredKeyPassword'];
            $this->InvalidKeyPassword = $this->getModelPage()['InvalidKeyPassword'];
        }
    }
    //setup project no valid email exist
    function initErrorsEmailPassword3(){
        $this->initErrorsEmailPassword();
        if(!isset($_POST['Email']) || $_POST['Email'] === '')
            $this->showError($this->getRequiredEmail());
        else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
            $this->showError($this->getInvalidEmail());
        else if(!isset($_POST['Password']) || $_POST['Password'] === '')
            $this->showError($this->getRequiredPassword());
        else if(strlen($_POST['Password']) < 8)
            $this->showError($this->getInvalidPassword());
        else if(ModelJson::getFileName() !== 'LoginPost' && !isset($_POST['Key']) || ModelJson::getFileName() !== 'LoginPost' && $_POST['Key'] === '')
                $this->showError($this->getRequiredKeyPassword());
        else if(ModelJson::getFileName() !== 'LoginPost' && strlen($_POST['Key']) < 8)
            $this->showError($this->getInvalidKeyPassword());
    }
    function initErrorsKeyPassword2($myData){
       if(isset($myData['Users'][$this->keyId]['Email']) && $_POST['Email'] === $myData['Users'][$this->keyId]['Email'] ||
            //make edit create account and check exist email
            isset($myData['Users']) && !in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $myData['Users']))||
            //check users empty
            !isset($myData['Users'])){
                $myData['Users'][$this->keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                return $myData;
            //show message email exist
        }else
            $this->showError($this->getModelPage()['EmailExist']);
        
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
}
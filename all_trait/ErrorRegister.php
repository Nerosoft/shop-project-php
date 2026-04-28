<?php
trait ErrorRegister{
    private $RequiredConfirmPassword;
    private $InvalidConfirmPassword;
    private $PasswordDosNotMatch;
    public function initErrorsRegister($error){
        $this->RequiredConfirmPassword = $error['RequiredConfirmPassword'];
        $this->InvalidConfirmPassword = $error['InvalidConfirmPassword'];
        $this->PasswordDosNotMatch = $error['PasswordDosNotMatch'];
    }
    function initErrorsRegister2($modal, $keyId){
        $this->initErrorsRegister($modal->getModelPage());
        if(!isset($_POST['password_confirmation']) || $_POST['password_confirmation'] === '')
            MyRegister::initMyRegister($this->getRequiredConfirmPassword(), 'danger');
        else if(strlen($_POST['password_confirmation']) < 8)
            MyRegister::initMyRegister($this->getInvalidConfirmPassword(), 'danger');
        else if($_POST['Password'] !== $_POST['password_confirmation'])
            MyRegister::initMyRegister($this->getPasswordDosNotMatch(), 'danger');
}
    function getPasswordDosNotMatch(){
        return $this->PasswordDosNotMatch;
    }
    function getRequiredConfirmPassword(){
        return $this->RequiredConfirmPassword;
    }
    function getInvalidConfirmPassword(){
        return $this->InvalidConfirmPassword;
    }
}
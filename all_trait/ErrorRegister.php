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
    function initErrorsRegister2($modal){
        $this->initErrorsRegister($modal->getModelPage());
        if(!isset($_POST['password_confirmation']) || $_POST['password_confirmation'] === '')
            ModelJson::initView2($this->getUrlName2(), $this->getRequiredConfirmPassword());
        else if(strlen($_POST['password_confirmation']) < 8)
            ModelJson::initView2($this->getUrlName2(), $this->getInvalidConfirmPassword());
        else if($_POST['Password'] !== $_POST['password_confirmation'])
            ModelJson::initView2($this->getUrlName2(), $this->getPasswordDosNotMatch());
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
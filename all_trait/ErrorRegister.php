<?php
trait ErrorRegister{
    private $RequiredConfirmPassword;
    private $InvalidConfirmPassword;
    private $PasswordDosNotMatch;
    public function initErrorsRegister(){
        $this->RequiredConfirmPassword = $this->getModelPage()['RequiredConfirmPassword'];
        $this->InvalidConfirmPassword = $this->getModelPage()['InvalidConfirmPassword'];
        $this->PasswordDosNotMatch = $this->getModelPage()['PasswordDosNotMatch'];
    }
    function initErrorsRegister2(){
        $this->initErrorsRegister();
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
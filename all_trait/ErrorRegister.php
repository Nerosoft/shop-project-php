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
            $this->showError($this->getRequiredConfirmPassword());
        else if(strlen($_POST['password_confirmation']) < 8)
            $this->showError($this->getInvalidConfirmPassword());
        else if($_POST['Password'] !== $_POST['password_confirmation'])
            $this->showError($this->getPasswordDosNotMatch());
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
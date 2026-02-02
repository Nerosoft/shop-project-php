<?php
require 'ErrorsEmailPassword.php';
trait ErrorsPassword{
    use ErrorsEmailPassword;
    private $RequiredPassword;
    private $InvalidPassword;
    public function initErrorsPassword($error){
        $this->initErrorsEmailPassword($error);
        $this->RequiredPassword = $error['RequiredPassword'];
        $this->InvalidPassword = $error['InvalidPassword'];
    }
    function getRequiredPassword(){
        return $this->RequiredPassword;
    }
    function getInvalidPassword(){
        return $this->InvalidPassword;
    }
}
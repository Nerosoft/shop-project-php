<?php
require 'ErrorsPassword.php';
trait ErrorLoginRegister{
    use ErrorsPassword;
    private $ChangeLang;
    private $ChangeStyle;
    function initErrorsLoginRegister($error){
        $this->initErrorsPassword($error);
        $this->ChangeLang = $error['UsedLanguage'];
        $this->ChangeStyle = $error['UsedStyle'];
    }
    function getChangeLang(){
        return $this->ChangeLang;
    }
    function getChangeStyle(){
        return $this->ChangeStyle;
    }
}
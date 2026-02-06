<?php
require 'ErrorsHomeName.php';
require 'ErrorsEmailPassword.php';
trait ErrorLangStyle{
    use ErrorsEmailPassword, ErrorsHomeName;
    private $ChangeLang;
    private $ChangeStyle;
    function initErrorLangStyle($error){
        $this->initErrorsEmailPassword($error);
        $this->initErrorsHomeName($error);
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
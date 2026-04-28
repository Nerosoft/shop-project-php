<?php
require 'ErrorsKeyPassword.php';
require 'ErrorsEmailPassword.php';
trait EmailPassword{
    use ErrorsKeyPassword, ErrorsEmailPassword;
    private $LabelEmail;
    private $HintEmail;
    private $info;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    function initEmailPassword($info){
        $this->initErrorsKeyPassword($info);
        $this->initErrorsEmailPassword($info);
        $this->LabelEmail = $info['LabelEmail'];
        $this->HintEmail = $info['HintEmail'];
        $this->info = $info;
        $this->LabelKeyPassword = $info['LabelKeyPassword'];
        $this->HintKeyPassword = $info['HintKeyPassword'];
    }
    function getLabelKeyPassword(){
        return $this->LabelKeyPassword;
    }
    function getHintKeyPassword(){
        return $this->HintKeyPassword;
    }
    function getLabelEmail(){
        return $this->LabelEmail;
    }
    function getHintEmail(){
        return $this->HintEmail;
    }
    function getLabelPassword($key = 'LabelPassword'){
        return $this->info[$key];
    }
    function getHintPassword($key = 'HintPassword'){
        return $this->info[$key];
    }
}
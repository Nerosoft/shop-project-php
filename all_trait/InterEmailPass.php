<?php
require 'ErrorsEmailPassword.php';
trait EmailPassword{
    use ErrorsEmailPassword;
    private $LabelEmail;
    private $HintEmail;
    private $info;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    private $CheckbooksState;
    function getCheckbooksState(){
        return $this->CheckbooksState;
    }
    function initEmailPassword($info){
        $this->initErrorsEmailPassword($info);
        $this->LabelEmail = $info['LabelEmail'];
        $this->HintEmail = $info['HintEmail'];
        $this->info = $info;
        $this->LabelKeyPassword = $info['LabelKeyPassword'];
        $this->HintKeyPassword = $info['HintKeyPassword'];
        if($this->getUrlName2() === 'Login' || $this->getUrlName2() === 'Users')
        $this->CheckbooksState = $info['CheckbooksState'];
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
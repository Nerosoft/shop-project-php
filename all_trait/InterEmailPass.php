<?php
require 'ErrorsEmailPassword.php';
trait EmailPassword{
    use ErrorsEmailPassword;
    private $LabelEmail;
    private $HintEmail;
    private $LabelPassword;
    private $HintPassword;
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
        $this->LabelKeyPassword = $info['LabelKeyPassword'];
        $this->LabelPassword = $info['NewPassword'];
        $this->HintPassword = $info['NewHintPassword'];
        $this->HintKeyPassword = $info['HintKeyPassword'];
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
    function getLabelPassword(){
        return $this->LabelPassword;
    }
    function getHintPassword(){
        return $this->HintPassword;
    }
}
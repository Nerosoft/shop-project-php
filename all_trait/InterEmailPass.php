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
    function initEmailPassword(){
        $this->initErrorsEmailPassword();
        $this->LabelEmail = $this->getModelPage()['LabelEmail'];
        $this->HintEmail = $this->getModelPage()['HintEmail'];
        $this->LabelKeyPassword = $this->getModelPage()['LabelKeyPassword'];
        $this->LabelPassword = $this->getModelPage()['NewPassword'];
        $this->HintPassword = $this->getModelPage()['NewHintPassword'];
        $this->HintKeyPassword = $this->getModelPage()['HintKeyPassword'];
        $this->CheckbooksState = $this->getModelPage()['CheckbooksState'];
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
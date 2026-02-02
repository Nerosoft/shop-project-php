<?php
require 'LoginRegister.php';
require 'ErrorRegister.php';
class MyRegister extends LoginRegister{    
    use ErrorRegister;
    private $LabelConfirmPassword;
    private $HintConfirmPassword;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Register', $message, $type);
        $this->initErrorsRegister($this->getModelPage());
        $this->LabelConfirmPassword = $this->getModelPage()['LabelConfirmPassword'];
        $this->HintConfirmPassword = $this->getModelPage()['HintConfirmPassword'];
        $this->LabelKeyPassword = $this->getModelPage()['LabelKeyPassword'];
        $this->HintKeyPassword = $this->getModelPage()['HintKeyPassword'];
    }
    function getLabelConfirmPassword(){
        return $this->LabelConfirmPassword;
    }
    function getHintConfirmPassword(){
        return $this->HintConfirmPassword;
    }
    function getLabelKeyPassword(){
        return $this->LabelKeyPassword;
    }
    function getHintKeyPassword(){
        return $this->HintKeyPassword;
    }
}
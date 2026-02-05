<?php
require 'LoginRegister.php';
class MyLogin extends LoginRegister{
    private $ButtonForgetPassword;
    private $ModalForgetPasswordTitle;
    private $ModalForgetPasswordButton;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Login', $message, $type);
        $this->ButtonForgetPassword = $this->getModelPage()['ButtonForgetPassword'];
        $this->ModalForgetPasswordTitle = $this->getModelPage()['ModalForgetPasswordTitle'];
        $this->ModalForgetPasswordButton = $this->getModelPage()['ModalForgetPasswordButton'];
        $this->LabelKeyPassword = $this->getModelPage()['LabelKeyPassword'];
        $this->HintKeyPassword = $this->getModelPage()['HintKeyPassword'];
    }
    static function initMyLogin($message = 'LoadMessage', $type = 'success'){
        $view = new MyLogin($message, $type);
        include 'login_view.php';
        exit;
    }
    function getButtonForgetPassword(){
        return $this->ButtonForgetPassword;
    }
    function getModalForgetPasswordTitle(){
        return $this->ModalForgetPasswordTitle;
    }
    function getModalForgetPasswordButton(){
        return $this->ModalForgetPasswordButton;
    }
    function getLabelKeyPassword(){
        return $this->LabelKeyPassword;
    }
    function getHintKeyPassword(){
        return $this->HintKeyPassword;
    }
}
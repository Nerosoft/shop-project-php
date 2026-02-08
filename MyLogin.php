<?php
require 'LoginRegister.php';
require 'ErrorsKeyPassword.php';
require 'InterCheckbooksState.php';
class MyLogin extends LoginRegister implements CheckbooksState{
    use ErrorsKeyPassword;
    private $ButtonForgetPassword;
    private $ModalForgetPasswordTitle;
    private $ModalForgetPasswordButton;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    private $NewPassword;
    private $CheckbooksState;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Login', $message, $type);
        $this->initErrorsKeyPassword($this->getModelPage());
        $this->ButtonForgetPassword = $this->getModelPage()['ButtonForgetPassword'];
        $this->ModalForgetPasswordTitle = $this->getModelPage()['ModalForgetPasswordTitle'];
        $this->ModalForgetPasswordButton = $this->getModelPage()['ModalForgetPasswordButton'];
        $this->LabelKeyPassword = $this->getModelPage()['LabelKeyPassword'];
        $this->HintKeyPassword = $this->getModelPage()['HintKeyPassword'];
        $this->NewPassword = $this->getModelPage()['NewPassword'];
        $this->CheckbooksState = $this->getModelPage()['CheckbooksState'];
    }
    static function initMyLogin($message = 'LoadMessage', $type = 'success'){
        $view = new MyLogin($message, $type);
        include 'login_view.php';
        exit;
    }
    function getCheckbooksState(){
        return $this->CheckbooksState;
    }
    function getNewPassword(){
        return $this->NewPassword;
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
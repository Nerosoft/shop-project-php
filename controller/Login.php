<?php
class Login extends LoginRegister{
    private $ButtonForgetPassword;
    private $ModalForgetPasswordTitle;
    private $ModalForgetPasswordButton;
    function __construct($message, $type){
        parent::__construct($message, $type);
        $this->ButtonForgetPassword = $this->getModelPage()['ButtonForgetPassword'];
        $this->ModalForgetPasswordTitle = $this->getModelPage()['ModalForgetPasswordTitle'];
        $this->ModalForgetPasswordButton = $this->getModelPage()['ModalForgetPasswordButton'];
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
}
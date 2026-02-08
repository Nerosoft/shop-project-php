<?php
require 'LoginRegister.php';
require 'InterCheckbooksState.php';
class MyLogin extends LoginRegister{
    use CheckbooksState;
    private $ButtonForgetPassword;
    private $ModalForgetPasswordTitle;
    private $ModalForgetPasswordButton;
    private $NewPassword;
    private $NewHintPassword;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Login', $message, $type);
        $this->InitCheckbooksState($this->getModelPage());
        $this->ButtonForgetPassword = $this->getModelPage()['ButtonForgetPassword'];
        $this->ModalForgetPasswordTitle = $this->getModelPage()['ModalForgetPasswordTitle'];
        $this->ModalForgetPasswordButton = $this->getModelPage()['ModalForgetPasswordButton'];
        $this->NewPassword = $this->getModelPage()['NewPassword'];
        $this->NewHintPassword = $this->getModelPage()['NewHintPassword'];
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
    function getNewPassword(){
        return $this->NewPassword;
    }
    function getNewHintPassword(){
        return $this->NewHintPassword;
    }
}
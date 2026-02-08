<?php
require 'page.php';
require 'Users.php';
require 'ErrorsKeyPassword.php';
require 'ErrorsEmailPassword.php';
require 'InterEmailPass.php';
require 'InterCheckbooksState.php';
class MySettingUsers extends page{
    use ErrorsKeyPassword, ErrorsEmailPassword, EmailPassword, CheckbooksState;
    private $NameHeadTable;
    private $PasswordHeadTable;
    private $ForgetPasswordHeadTable;
    private $DataView;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('SettingUsers', $message, $type);
        $this->initErrorsKeyPassword($this->getModelPage());
        $this->initErrorsEmailPassword($this->getModelPage());
        $this->initEmailPassword($this->getModelPage());
        $this->InitCheckbooksState($this->getModelPage());
        $this->NameHeadTable = $this->getModelPage()['NameHeadTable'];
        $this->PasswordHeadTable = $this->getModelPage()['PasswordHeadTable'];
        $this->ForgetPasswordHeadTable = $this->getModelPage()['ForgetPasswordHeadTable'];
        $this->DataView = isset($this->getObj()['Users']) ? array_reverse(Users::fromArray($this->getObj()['Users'])):array();
    }
    static function initMySettingUsers($message = 'LoadMessage', $type = 'success'){
        $view = new MySettingUsers($message, $type);
        include 'SettingUsers_view.php';
        exit;
    }
    function getMyDataView(){
        return $this->DataView;
    }
    function getNameHeadTable(){
        return $this->NameHeadTable;
    }
    function getPasswordHeadTable(){
        return $this->PasswordHeadTable;
    }
    function getForgetPasswordHeadTable(){
        return $this->ForgetPasswordHeadTable;
    }
}
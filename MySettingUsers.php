<?php
require 'page.php';
require 'Users.php';
require 'InterEmailPass.php';
require 'InterCheckbooksState.php';
include 'InterfaceDataView.php';
class MySettingUsers extends page implements InterfaceDataView{
    use EmailPassword, CheckbooksState;
    private $NameHeadTable;
    private $PasswordHeadTable;
    private $ForgetPasswordHeadTable;
    private $DataView;
    private $AllBranches;
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
        $this->AllBranches = $this->getModelPage()['AllBranches'];
    }
    function getAllBranches(){
        return $this->AllBranches;
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
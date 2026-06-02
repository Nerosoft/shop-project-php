<?php
require 'page.php';
require 'class_object/Users.php';
require 'all_trait/InterEmailPass.php';
include 'interface/InterfaceDataView.php';
class MySettingUsers extends page implements InterfaceDataView{
    use EmailPassword;
    private $NameHeadTable;
    private $PasswordHeadTable;
    private $ForgetPasswordHeadTable;
    private $DataView;
    function __construct($message, $type){
        parent::__construct('Users', $message, $type);
        $this->initEmailPassword();
        $this->NameHeadTable = $this->getModelPage()['NameHeadTable'];
        $this->PasswordHeadTable = $this->getModelPage()['PasswordHeadTable'];
        $this->ForgetPasswordHeadTable = $this->getModelPage()['ForgetPasswordHeadTable'];
        $this->DataView = isset($this->getObj()['Users']) ? array_reverse(Users::fromArray($this->getObj()['Users'])):array();
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
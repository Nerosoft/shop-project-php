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
    function __construct($message, $type){
        parent::__construct('Users', $message, $type, function(){
            return isset($this->getObj()['Users']) ? array_reverse(Users::fromArray($this->getObj()['Users'])):array();
        }, Users::getKeysObject());
        $this->initEmailPassword();
        // $this->NameHeadTable = $this->getModelPage()['NameHeadTable'];
        // $this->PasswordHeadTable = $this->getModelPage()['PasswordHeadTable'];
        // $this->ForgetPasswordHeadTable = $this->getModelPage()['ForgetPasswordHeadTable'];
    }
    function getNameHeadTable(){
        return $this->NameHeadTable = $this->getModelPage()['NameHeadTable'];//$this->NameHeadTable;
    }
    function getPasswordHeadTable(){
        return $this->getModelPage()['PasswordHeadTable'];//$this->PasswordHeadTable;
    }
    function getForgetPasswordHeadTable(){
        return $this->getModelPage()['ForgetPasswordHeadTable'];//$this->ForgetPasswordHeadTable;
    }
    function printTableNames(){
        echo<<<HTML
            <th>{$this->getNameHeadTable()}</th>
            <th>{$this->getPasswordHeadTable()}</th>
            <th>{$this->getForgetPasswordHeadTable()}</th>
        HTML;
    }
    function makeCreateModal($view, $title, $button){
        $action = 'SettingUsersCreatePost.php';
        include('all_modal/modal_setting_users_table.php');
    }
}
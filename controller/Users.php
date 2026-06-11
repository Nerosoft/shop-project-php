<?php
require 'AdminMenu.php';
require 'class_object/Users.php';
require 'all_trait/InterEmailPass.php';
include 'interface/InterfaceDataView.php';
class MySettingUsers extends AdminMenu implements InterfaceDataView{
    use EmailPassword;
    private $NameHeadTable;
    private $PasswordHeadTable;
    private $ForgetPasswordHeadTable;
    function __construct($message, $type){
        parent::__construct('Users', $message, $type, function(){
            $this->initEmailPassword();
            $this->NameHeadTable = $this->getModelPage()['NameHeadTable'];
            $this->PasswordHeadTable = $this->getModelPage()['PasswordHeadTable'];
            $this->ForgetPasswordHeadTable = $this->getModelPage()['ForgetPasswordHeadTable'];
            return isset($this->getObj()['Users']) ? array_reverse(Users::fromArray($this->getObj()['Users'])):array();
        }, Users::getKeysObject(), function ($view, $title, $button){
            $this->makeCreateModal($view, $title, $button);
        });
    }
    function getNameHeadTable(){
        return $this->NameHeadTable = $this->NameHeadTable;
    }
    function getPasswordHeadTable(){
        return $this->PasswordHeadTable;
    }
    function getForgetPasswordHeadTable(){
        return $this->ForgetPasswordHeadTable;
    }
    function printTableNames(){
        echo<<<HTML
            <th>{$this->getNameHeadTable()}</th>
            <th>{$this->getPasswordHeadTable()}</th>
            <th>{$this->getForgetPasswordHeadTable()}</th>
        HTML;
    }
    // static function makeCreateModal($view, $title, $button, $idModel = 'createModel', $index = null, $myObject = null, $action = 'SettingUsersCreatePost.php'){
    //     include('all_modal/modal_setting_users_table.php');
    // }
}
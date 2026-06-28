<?php
require 'AdminMenu.php';
require 'class_object/Users.php';
require 'all_trait/InterEmailPass.php';
include 'interface/InterfaceDataView.php';
class MySettingUsers extends AdminMenu implements InterfaceDataView{
    use EmailPassword;
    private $ForgetPasswordHeadTable;
    function __construct($message, $type){
        parent::__construct('Users', $message, $type, function(){
            $this->initEmailPassword();
            return isset($this->getObj()['Users']) ? array_reverse(Users::fromArray($this->getObj()['Users'])):array();
        }, Users::getKeysObject());
    }
}
<?php
require 'page.php';
require 'Users.php';
require 'ErrorsKeyPassword.php';
require 'ErrorsEmailPassword.php';
require 'InterEmailPass.php';
require 'InterKeyPassword.php';
require 'InterCheckbooksState.php';
class MySettingUsers extends page implements EmailPassword, MyKeyPass, CheckbooksState{
    use ErrorsKeyPassword, ErrorsEmailPassword;
    private $NameHeadTable;
    private $PasswordHeadTable;
    private $ForgetPasswordHeadTable;
    private $LabelName;
    private $HintName;
    private $LabelPassword;
    private $HintPassword;
    private $LabelForgetPassword;
    private $HintForgetPassword;
    private $CheckbooksState;
    private $DataView;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('SettingUsers', $message, $type);
        $this->initErrorsKeyPassword($this->getModelPage());
        $this->initErrorsEmailPassword($this->getModelPage());
        $this->NameHeadTable = $this->getModelPage()['NameHeadTable'];
        $this->PasswordHeadTable = $this->getModelPage()['PasswordHeadTable'];
        $this->ForgetPasswordHeadTable = $this->getModelPage()['ForgetPasswordHeadTable'];
        $this->LabelName = $this->getModelPage()['LabelName'];
        $this->HintName = $this->getModelPage()['HintName'];
        $this->LabelPassword = $this->getModelPage()['LabelPassword'];
        $this->HintPassword = $this->getModelPage()['HintPassword'];
        $this->LabelForgetPassword = $this->getModelPage()['LabelForgetPassword'];
        $this->HintForgetPassword = $this->getModelPage()['HintForgetPassword'];
        $this->CheckbooksState = $this->getModelPage()['CheckbooksState'];
        $this->DataView = isset($this->getObj()['Users']) ? array_reverse(Users::fromArray($this->getObj()['Users'])):array();
    }
    static function initMySettingUsers($message = 'LoadMessage', $type = 'success'){
        $view = new MySettingUsers($message, $type);
        include 'SettingUsers_view.php';
        exit;
    }
    function getCheckbooksState(){
        return $this->CheckbooksState;
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
    function getLabelEmail(){
        return $this->LabelName;
    }
    function getHintEmail(){
        return $this->HintName;
    }
    function getLabelPassword(){
        return $this->LabelPassword;
    }
    function getHintPassword(){
        return $this->HintPassword;
    }
    function getLabelKeyPassword(){
        return $this->LabelForgetPassword;
    }
    function getHintKeyPassword(){
        return $this->HintForgetPassword;
    }
}
<?php
require 'ErrorsEmailPassword.php';
trait ErrorsPassword{
    use ErrorsEmailPassword;
    private $RequiredPassword;
    private $InvalidPassword;
    public function initErrorsPassword($error){
        $this->initErrorsEmailPassword($error);
        $this->RequiredPassword = $error['RequiredPassword'];
        $this->InvalidPassword = $error['InvalidPassword'];
    }
    function initErrorsPassword2($modal, $keyId){
        $this->initErrorsPassword($modal->getModelPage());
        if(!isset($_POST['Email']) || $_POST['Email'] === '')
            MySettingUsers::initMySettingUsers($this->getRequiredEmail(), 'danger');
        else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
            MySettingUsers::initMySettingUsers($this->getInvalidEmail(), 'danger');
        else if(isset($modal->getObj()['Users']) && in_array($_POST['Email'], array_map(function($obj) {return $obj['Email'];}, $modal->getObj()['Users'])) && $modal->getSCRIPTFILENAME() === 'SettingUsersCreatePost' || isset($_POST['id']) && isset($modal->getObj()['Users'][$_POST['id']]) && in_array($_POST['Email'], array_map(function($obj) {return $obj['Email'];}, $modal->getObj()['Users'])) && $modal->getObj()['Users'][$_POST['id']]['Email'] !== $_POST['Email'] && $modal->getSCRIPTFILENAME() === 'SettingUsersEditPost')
            MySettingUsers::initMySettingUsers($modal->getModelPage()['EmailExist'], 'danger');
        else if(!isset($_POST['Password']) || $_POST['Password'] === '')
            MySettingUsers::initMySettingUsers($this->getRequiredPassword(), 'danger');
        else if(strlen($_POST['Password']) < 8)
            MySettingUsers::initMySettingUsers($this->getInvalidPassword(), 'danger');
        else if(!isset($_POST['Key']) || $_POST['Key'] === '')
            MySettingUsers::initMySettingUsers($this->getRequiredKeyPassword(), 'danger');
        else if(strlen($_POST['Key']) < 8)
            MySettingUsers::initMySettingUsers($this->getInvalidKeyPassword(), 'danger');
        else{
            $myData = $this->getObj();
            $myData['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
            $this->saveModel($myData);
        }
    }
    function getRequiredPassword(){
        return $this->RequiredPassword;
    }
    function getInvalidPassword(){
        return $this->InvalidPassword;
    }
}
<?php
trait ErrorsEmailPassword{
    private $RequiredEmail;
    private $InvalidEmail;
    private $RequiredPassword;
    private $InvalidPassword;
    public function initErrorsEmailPassword($error){
        $this->RequiredEmail = $error['RequiredEmail'];
        $this->InvalidEmail = $error['InvalidEmail'];
        $this->RequiredPassword = $error['RequiredPassword'];
        $this->InvalidPassword = $error['InvalidPassword'];
    }
    function initErrorsEmailPassword2($modal, $users = null){
        $this->initErrorsEmailPassword($modal->getModelPage());
        if(!isset($_POST['Email']) || $_POST['Email'] === '')
            ModelJson::initViewPost($this->getRequiredEmail());
        else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
            ModelJson::initViewPost($this->getInvalidEmail());
        else if($modal->getSCRIPTFILENAME() === 'LoginForgetPasswordPost' && !in_array($_POST['Email'], array_map(function($obj) {return $obj->getName();}, $users)) || $modal->getSCRIPTFILENAME() === 'RegisterPost' && in_array($_POST['Email'], array_map(function($obj) {return $obj->getName();}, $users)) || $modal->getSCRIPTFILENAME() === 'LoginPost' && !in_array($_POST['Email'], array_map(function($obj) {return $obj->getName();}, $users)) || $modal->getSCRIPTFILENAME() === 'SettingUsersCreatePost' && isset($modal->getObj()['Users']) && in_array($_POST['Email'], array_map(function($obj) {return $obj['Email'];}, $modal->getObj()['Users'])) || $modal->getSCRIPTFILENAME() === 'SettingUsersEditPost' && isset($_POST['id']) && isset($modal->getObj()['Users'][$_POST['id']]) && in_array($_POST['Email'], array_map(function($obj) {return $obj['Email'];}, $modal->getObj()['Users'])) && $modal->getObj()['Users'][$_POST['id']]['Email'] !== $_POST['Email'])
            ModelJson::initViewPost($modal->getModelPage()['EmailExist']);
        else if(!isset($_POST['Password']) || $_POST['Password'] === '')
            ModelJson::initViewPost($this->getRequiredPassword());
        else if(strlen($_POST['Password']) < 8)
            ModelJson::initViewPost($this->getInvalidPassword());
    }
    function getRequiredEmail(){
        return $this->RequiredEmail;
    }
    function getInvalidEmail(){
        return $this->InvalidEmail;
    }
    function getRequiredPassword(){
        return $this->RequiredPassword;
    }
    function getInvalidPassword(){
        return $this->InvalidPassword;
    }
}
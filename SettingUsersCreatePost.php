<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
class SettingUsersCreatePost extends ModelJson{
    use ErrorsKeyPassword, ErrorsEmailPassword;
    function __construct(){
        parent::__construct('SettingUsers');
        $this->initErrorsEmailPassword2($this->getMyModal());
        $this->initErrorsKeyPassword2($this->getMyModal(), $this->getRandomId());
        MySettingUsers::initMySettingUsers('MessageModelCreate');
    }
}

new SettingUsersCreatePost();
}else
    header('LOCATION:SettingUsers.php');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
class SettingUsersEditPost extends ValidationId{
    use ErrorsKeyPassword, ErrorsEmailPassword;
    function __construct(){
        parent::__construct('SettingUsers');
        $this->initErrorsEmailPassword2($this->getMyModal());
        $this->initErrorsKeyPassword2($this->getMyModal(), $_POST['id']);
        MySettingUsers::initMySettingUsers('MessageModelEdit');
    }
}

new SettingUsersEditPost();
}else
    header('LOCATION:view?id=SettingUsers');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
class SettingUsersEditPost extends ValidationId{
    use ErrorsPassword;
    function __construct(){
        parent::__construct('SettingUsers');
        $this->initErrorsPassword2($this->getMyModal(), $_POST['id']);
        MySettingUsers::initMySettingUsers('MessageModelEdit');
    }
}

new SettingUsersEditPost();
}else
    header('LOCATION:SettingUsers.php');
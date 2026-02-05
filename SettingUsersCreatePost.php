<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
class SettingUsersCreatePost extends ModelJson{
    use ErrorsPassword;
    function __construct(){
        parent::__construct('SettingUsers');
        $this->initErrorsPassword2($this->getMyModal(), $this->getRandomId());
        MySettingUsers::initMySettingUsers('MessageModelCreate');
    }
}

new SettingUsersCreatePost();
}else
    header('LOCATION:SettingUsers.php');
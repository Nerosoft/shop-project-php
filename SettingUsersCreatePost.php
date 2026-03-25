<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
//make extends ValidationId and valid id branch and id users inside ValidationId class
class SettingUsersCreatePost extends ValidationId{
    use ErrorsKeyPassword, ErrorsEmailPassword;
    function __construct(){
        parent::__construct('Users');
        $this->initErrorsEmailPassword3($this->getMyModal());
        $this->initErrorsKeyPassword2($this->getMyModal(), $this->getRandomId());
        MySettingUsers::initMySettingUsers('MessageModelCreate');
    }
}

new SettingUsersCreatePost();
}else
    header('LOCATION:view?id=Users');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
class SettingUsersDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('SettingUsers');
        $this->deleteItem('Users');
        MySettingUsers::initMySettingUsers('Delete');
    }
}

new SettingUsersDeletePost();
}else
    header('LOCATION:SettingUsers.php');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
class SettingUsersDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Users');
        $this->saveModel($this->deleteItem('Users', $this->getObj()));
        MySettingUsers::initMySettingUsers('Delete');
    }
}

new SettingUsersDeletePost();
}else
    header('LOCATION:view?id=Users');
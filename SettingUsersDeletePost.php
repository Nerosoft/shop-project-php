<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
class SettingUsersDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('SettingUsers');
        if($this->isEmptyErrors()){
            $this->deleteItem('Users');
            $view = new MySettingUsers('Delete');
        }else{
            $view = new MySettingUsers();
            $this->displayErrors();
        }
        include 'SettingUsers_view.php';
    }
}

new SettingUsersDeletePost();
}else
    header('LOCATION:SettingUsers.php');
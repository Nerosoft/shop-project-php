<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
class SettingUsersEditPost extends ValidationId{
    use ErrorsPassword;
    function __construct(){
        parent::__construct('SettingUsers');
        $this->initErrorsPassword($this->getModelPage());
        $this->validUsers($this);
        if($this->isEmptyErrors()){
            $this->saveUsers($_POST['id']);
            $view = new MySettingUsers('MessageModelEdit');
        }else{
            $view = new MySettingUsers();
            $this->displayErrors();
        }
        include 'SettingUsers_view.php';
    }
}

new SettingUsersEditPost();
}else
    header('LOCATION:SettingUsers.php');
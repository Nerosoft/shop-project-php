<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'controller/MySettingUsers.php';
require 'ValidationId.php';
//make extends ValidationId and valid id branch and id users inside ValidationId class
class SettingUsersCreatePost extends ValidationId{
    use ErrorsKeyPassword, ErrorsEmailPassword;
    function __construct(){
        $keyId = isset($_POST['id'])?$_POST['id']:$this->getRandomId();
        parent::__construct('Users', function($myFile)use($keyId){
            return $this->initErrorsKeyPassword2($this->getMyModal(), $keyId, $myFile);
        });
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->initErrorsKeyPassword2($this->getMyModal(), $keyId, $this->getMyModal()->getObj()));
        MySettingUsers::initMySettingUsers(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
}

new SettingUsersCreatePost();
}else
    header('LOCATION:view?id=Users');
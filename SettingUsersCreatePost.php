<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'controller/MySettingUsers.php';
require 'ValidationId.php';
//make extends ValidationId and valid id branch and id users inside ValidationId class
class SettingUsersCreatePost extends ValidationId{
    use ErrorsKeyPassword, ErrorsEmailPassword;
    function __construct(){
        $keyId = isset($_POST['id'])?$_POST['id']:$this->getRandomId();
        parent::__construct('Users', function($myFile)use($keyId){
            if(isset($myFile['Users']) && in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $myFile['Users'])) || isset($_POST['id']) && isset($myFile['Users'][$_POST['id']]) && $myFile['Users'][$_POST['id']]['Email'] !== $_POST['Email'] && in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $myFile['Users'])))
                MySettingUsers::initMySettingUsers('EmailExist', 'danger');
            else{
                $myFile['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                return $myFile;
            }
        });
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->initErrorsKeyPassword2($this->getMyModal(), $keyId);
        MySettingUsers::initMySettingUsers(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
}

new SettingUsersCreatePost();
}else
    header('LOCATION:view?id=Users');
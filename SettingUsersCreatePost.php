<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
//make extends ValidationId and valid id branch and id users inside ValidationId class
class SettingUsersCreatePost extends ValidationId{
    use ErrorsKeyPassword, ErrorsEmailPassword;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Users');
        $this->initErrorsEmailPassword3($this->getMyModal());
        $keyId = isset($_POST['id'])?$_POST['id']:$this->getMyModal()->getRandomId();
        if(isset($_POST['Branches']) || isset($_POST['choices'])){
            parent::__construct($this->getMyModal(), function($myFile)use($keyId){
                if(isset($myFile['Users']) && in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $myFile['Users'])) || isset($_POST['id']) && isset($myFile['Users'][$_POST['id']]) && $myFile['Users'][$_POST['id']]['Email'] !== $_POST['Email'] && in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $myFile['Users'])))
                   MySettingUsers::initMySettingUsers('EmailExist', 'danger');
                else{
                    $myFile['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                    return $myFile;
                }
            });
        }
        //for edit user
        else if(isset($_POST['id'])){
            parent::__construct($this->getMyModal());
            $this->initErrorsKeyPassword2($this->getMyModal(), $keyId);
        }else//for create user
            $this->initErrorsKeyPassword2($this->getMyModal(), $keyId);
        MySettingUsers::initMySettingUsers(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new SettingUsersCreatePost();
}else
    header('LOCATION:view?id=Users');
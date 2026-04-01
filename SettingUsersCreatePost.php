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
        if(isset($_POST['Branches']) || isset($_POST['choices']))
            parent::__construct($this->getMyModal(), isset($_POST['id'])?$_POST['id']:$this->getMyModal()->getRandomId());
        //for edit user
        else if(isset($_POST['id'])){
            parent::__construct($this->getMyModal(), $_POST['id']);
            $this->initErrorsKeyPassword2($this->getMyModal(), $_POST['id']);
        }else//for create user
            $this->initErrorsKeyPassword2($this->getMyModal(), $this->getMyModal()->getRandomId());
        MySettingUsers::initMySettingUsers(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new SettingUsersCreatePost();
}else
    header('LOCATION:view?id=Users');
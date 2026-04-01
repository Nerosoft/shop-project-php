<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
class SettingUsersDeletePost extends ValidationId{
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Users');
        parent::__construct($this->getMyModal());
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->deleteItem('Users', $this->getMyModal()->getObj()));
        MySettingUsers::initMySettingUsers('Delete');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new SettingUsersDeletePost();
}else
    header('LOCATION:view?id=Users');
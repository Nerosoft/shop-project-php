<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['id'])){
require ($_GET['id'] !== 'Users'?'MyFlexTablesView':'MySettingUsers').'.php';
require 'ValidationId.php';
class SettingUsersDeletePost extends ValidationId{
    private $modal;
    function __construct(){
        $this->modal = new ModelJson($_GET['id']);
        parent::__construct($this->getMyModal(), function($myFile){
            return $this->deleteItem($_GET['id'], $myFile);
        });
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->deleteItem($_GET['id'], $this->getMyModal()->getObj()));
        $this->getMyModal()->initViewPost('Delete', 'success');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new SettingUsersDeletePost();
}else
    header('LOCATION:index');
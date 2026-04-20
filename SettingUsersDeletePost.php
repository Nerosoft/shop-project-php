<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['id'])){
require ($_GET['id'] === 'Product' ? 'ProductClass' : ($_GET['id'] !== 'Users'?'MyFlexTablesView':'MySettingUsers')).'.php';
require 'ValidationId.php';
class SettingUsersDeletePost extends ValidationId{
    function __construct(){
        parent::__construct($_GET['id'], function($myFile, $key){
            if($this->getUrlName2() === 'Product')
                //delete image for product
                array_map('unlink', glob('asset/product/'.$key.'/'.$_POST['id'].'.*'));
            return $this->deleteItem($myFile);
        });
        if(!isset($_POST['Branches']) && !isset($_POST['choices'])){
            $this->saveModel($this->deleteItem($this->getObj()));
            if($this->getUrlName2() === 'Product')
                array_map('unlink', glob('asset/product/'.$this->getId().'/'.$_POST['id'].'.*'));
        }
        $this->initViewPost('Delete', 'success');
    }
}

new SettingUsersDeletePost();
}else
    header('LOCATION:index');
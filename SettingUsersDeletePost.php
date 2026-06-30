<?php
include 'auth/SessionPost.php';
class SettingUsersDeletePost extends ValidationId{
    //preg_match('/MyFlexTables/', ModelJson::getBackPage())?explode('=', ModelJson::getBackPage())[1]:ModelJson::getBackPage()
    function __construct(){
        parent::__construct($_GET['id'], function($myFile, $key){
            if($_GET['id'] !== 'Users')
                //delete image for product
                array_map('unlink', glob('asset/product/'.$key.'/'.$this->keyId.'.*'));
            return $this->deleteItem($myFile);
        }, 'Delete');
        $this->saveModel($this->deleteItem($this->getObj()));
        if($_GET['id'] !== 'Users')
            array_map('unlink', glob('asset/product/'.$this->getId().'/'.$this->keyId.'.*'));
        $this->showMessage($this->getModelPage()['Delete']);
    }
}
new SettingUsersDeletePost();
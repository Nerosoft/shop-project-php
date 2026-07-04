<?php
include 'auth/SessionPost.php';
class SettingUsersDeletePost extends ValidationId{
    function __construct(){
        parent::__construct(null, function($myFile, $key){
            if($this->getUrlName2() !== 'Users')
                //delete image for product
                array_map('unlink', glob('asset/product/'.$key.'/'.$this->keyId.'.*'));
            return $this->deleteItem($myFile);
        }, 'Delete');
        $this->saveModel($this->deleteItem($this->getObj()));
        if($this->getUrlName2() !== 'Users')
            array_map('unlink', glob('asset/product/'.$this->getId().'/'.$this->keyId.'.*'));
        $this->showMessage($this->getModelPage()['Delete']);
    }
}
new SettingUsersDeletePost();
<?php
// require 'auth/test_session4.php';
class SettingUsersDeletePost extends ModelJson{
    function __construct(){
        parent::__construct(null, 'Delete');
    }
    function getView(){
        $this->saveModel($this->deleteItem($this->getObj()));
        if($this->getUrlName2() !== 'Users')
            array_map('unlink', glob('asset/product/'.$this->getId().'/'.$this->keyId.'.*'));
    }
    function showMessagePost(){
        $this->showMessage($this->getModelPage()['Delete']);
    }
}
$view = new SettingUsersDeletePost();
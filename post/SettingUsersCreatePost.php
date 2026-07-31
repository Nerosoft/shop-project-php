<?php
// require 'auth/test_session4.php';
class SettingUsersCreatePost extends ModelJson{
    function __construct(){
        parent::__construct('Users', function($myFile){
            return $this->initErrorsKeyPassword2($myFile);
        }, isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getView(){
        $this->initErrorsEmailPassword3();
        $this->saveModel($this->initErrorsKeyPassword2($this->getObj()));
        $this->showMessage($this->getModelPage()[isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate']);
    }
}
$view = new SettingUsersCreatePost();
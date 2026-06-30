<?php
include 'auth/SessionPost.php';
class SettingUsersCreatePost extends ValidationId{
    use ErrorsEmailPassword;
    function __construct(){
        parent::__construct('Users', function($myFile){
            return $this->initErrorsKeyPassword2($myFile);
        }, isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
        $this->initErrorsEmailPassword3();
        $this->getMyModal()->saveModel($this->initErrorsKeyPassword2($this->getMyModal()->getObj()));
        $this->showMessage($this->getModelPage()[isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate']);
    }
}
new SettingUsersCreatePost();
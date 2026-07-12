<?php
include 'auth/SessionAdmin.php';
class SettingUsersCreatePost extends ModelJson{
    use ErrorsEmailPassword;
    function __construct(){
        parent::__construct('Users', function($myFile){
            return $this->initErrorsKeyPassword2($myFile);
        }, isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
        $this->initErrorsEmailPassword3();
        $this->saveModel($this->initErrorsKeyPassword2($this->getObj()));
        $this->showMessage($this->getModelPage()[isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate']);
    }
}
new SettingUsersCreatePost();
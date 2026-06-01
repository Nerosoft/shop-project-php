<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('Users', isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate', 'success', function(){
class SettingUsersCreatePost extends ValidationId{
    use ErrorsEmailPassword;
    function __construct(){
        parent::__construct('Users', function($myFile){
            return $this->initErrorsKeyPassword2($this->getMyModal(), $myFile);
        }, isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
        $this->getMyModal()->saveModel($this->initErrorsKeyPassword2($this->getMyModal(), $this->getMyModal()->getObj()));
    }
}
new SettingUsersCreatePost();
});
}else
    header('LOCATION:view?id=Users');
<?php
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'MyLogin.php';
    require 'DeleteInfoName.php';
    require 'Users.php';
    require 'MessageError.php';
    class LoginForgetPasswordPost extends MessageError{
        use ErrorsEmailPassword;
        private $users;
        function getUsers(){
            return $this->users;
        }
        function __construct(){
            parent::__construct('Login');
            $this->initErrorsEmailPassword($this->getModelPage());
            $this->users = isset($this->getObj()['Users']) ? Users::fromArray($this->getObj()['Users']):array();
            $this->validStaticId();
            if(!isset($_POST['Email']) || $_POST['Email'] === '')
                $this->setErrors($this->getRequiredEmail());
            else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']) || !in_array($_POST['Email'], array_map(function($obj) {return $obj->getName();}, $this->getUsers())))
                $this->setErrors($this->getInvalidEmail());
             if(!isset($_POST['Key']) || $_POST['Key'] === '')
                $this->setErrors($this->getRequiredKeyPassword());
            else if(strlen($_POST['Key']) < 8)
                $this->setErrors($this->getInvalidKeyPassword());
            if($this->isEmptyErrors()){
                foreach ($this->getUsers() as $key => $user) 
                    if($user->getName() === $_POST['Email'] && $user->getKey() === $_POST['Key']){
                        $view = new MyLogin('ForgetPasswordMessage');
                        $view->showToast($user->getKey(), 'success', 'ew32rwe', '55px');
                        include 'login_view.php';
                        return;
                    }
            }
            $view = new MyLogin('ForgetPasswordMessageInvlid', 'danger');
            $this->displayErrors();
            include 'login_view.php';
        }
    }
    new LoginForgetPasswordPost();
}else
    header('LOCATION:Login.php');
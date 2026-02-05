<?php
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'MyLogin.php';
    require 'DeleteInfoName.php';
    require 'Users.php';
    class LoginForgetPasswordPost extends ModelJson{
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
                MyLogin::initMyLogin($this->getRequiredEmail(), 'danger');
            else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']) || !in_array($_POST['Email'], array_map(function($obj) {return $obj->getName();}, $this->getUsers())))
                MyLogin::initMyLogin($this->getInvalidEmail(), 'danger');
            else if(!isset($_POST['Key']) || $_POST['Key'] === '')
                MyLogin::initMyLogin($this->getRequiredKeyPassword(), 'danger');
            else if(strlen($_POST['Key']) < 8)
                MyLogin::initMyLogin($this->getInvalidKeyPassword(), 'danger');
            else
                foreach ($this->getUsers() as $key => $user) 
                    if($user->getName() === $_POST['Email'] && $user->getKey() === $_POST['Key'])
                        MyLogin::initMyLogin($this->getModelPage()['ForgetPasswordMessage'].' '.$user->getKey());
            MyLogin::initMyLogin('ForgetPasswordMessageInvlid', 'danger');
        }
    }
    new LoginForgetPasswordPost();
}else
    header('LOCATION:Login.php');
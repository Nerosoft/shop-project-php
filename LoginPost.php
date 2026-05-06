<?php
include 'auth/SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'controller/MyLogin.php';
    require 'ValidationLoginRegister.php';
    class LoginPost extends ValidationLoginRegister{
        function __construct(){
            parent::__construct('Login');
            foreach ($this->getUsers() as $key => $value)
                if($value->getName() === $_POST['Email'] && $value->getPassword() === $_POST['Password'])
                    $this->redirectToAdminPage();
            MyLogin::initMyLogin('EmailPassword', 'danger');
        }
    }
    new LoginPost();
}else
    header('LOCATION:Login');
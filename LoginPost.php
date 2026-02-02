<?php
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'MyLogin.php';
    require 'ValidationLoginRegister.php';
    class LoginPost extends ValidationLoginRegister{
        function __construct(){
            parent::__construct('Login');
            
            if($this->isEmptyErrors()){
                foreach ($this->getUsers() as $key => $value)
                    if($value->getName() === $_POST['Email'] && $value->getPassword() === $_POST['Password'])
                        $this->redirectToAdminPage();
                    $view = new MyLogin('EmailPassword', 'danger');
            }else{
                $view = new MyLogin();
                $this->displayErrors();
            }
            include 'login_view.php';
        }
    }
    new LoginPost();
}else
    header('LOCATION:Login.php');
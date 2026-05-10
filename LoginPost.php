<?php
include 'auth/SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'ValidationId.php';
    class LoginPost extends ValidationId{
        use ErrorsEmailPassword;
        function __construct(){
            parent::__construct('Login');
            if(isset($this->getObj()['Users']))
                foreach ($this->getObj()['Users'] as $key => $value)
                    if($value['Email'] === $_POST['Email'] && $value['Password'] === $_POST['Password'])
                        $this->redirectToAdminPage();
            LoginRegister::initMyLoginRegister(false, 'EmailPassword', 'danger');
        }
    }
    new LoginPost();
}else
    header('LOCATION:Login');
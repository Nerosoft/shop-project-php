<?php 
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'MyRegister.php';
    require 'ValidationLoginRegister.php';
    class RegisterPost extends ValidationLoginRegister{
        use ErrorRegister, ErrorsKeyPassword;
        function __construct(){
            parent::__construct('Register');
            $keyId = $this->getRandomId();
            $this->initErrorsRegister2($this->getMyModal(), $keyId);
            $this->initErrorsKeyPassword2($this->getMyModal(), $keyId);
            $this->redirectToAdminPage();
        }
    }
    new RegisterPost();    
}else
    header('LOCATION:Register.php');
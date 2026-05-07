<?php 
include 'auth/SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'controller/MyRegister.php';
    require 'ValidationId.php';
    class RegisterPost extends ValidationId{
        use ErrorRegister, ErrorsEmailPassword;
        function __construct(){
            parent::__construct('Register');
            $keyId = $this->getRandomId();
            //valid confirm password
            $this->initErrorsRegister2($this->getMyModal(), $keyId);
            $this->getMyModal()->saveModel($this->initErrorsKeyPassword2($this->getMyModal(), $keyId, $this->getMyModal()->getObj()));
            $this->redirectToAdminPage();
        }
    }
    new RegisterPost();    
}else
    header('LOCATION:Register');
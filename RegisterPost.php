<?php 
include 'auth/SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('Register', 'RegisterMessage', 'success', function(){
    class RegisterPost extends ValidationId{
        use ErrorRegister, ErrorsEmailPassword;
        function __construct(){
            parent::__construct('Register');
            //valid confirm password
            $this->initErrorsRegister2($this->getMyModal());
            $this->getMyModal()->saveModel($this->initErrorsKeyPassword2($this->getMyModal(), $this->getMyModal()->getObj()));
        }
    }
    new RegisterPost();
}, 'RegisterMessage');    
}else
    header('LOCATION:Register');
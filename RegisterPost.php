<?php 
include 'auth/SessionAuth.php';
ModelJson::initView('Register', 'RegisterMessage', 'success', function(){
    class RegisterPost extends ValidationId{
        use ErrorRegister, ErrorsEmailPassword;
        function __construct(){
            parent::__construct('Register');
            //valid confirm password
            $this->initErrorsRegister2();
            $this->getMyModal()->saveModel($this->initErrorsKeyPassword2($this->getMyModal()->getObj()));
        }
    }
    return new RegisterPost();
}, 'RegisterMessage');
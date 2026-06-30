<?php 
include 'auth/SessionPost.php';
class RegisterPost extends ValidationId{
    use ErrorRegister, ErrorsEmailPassword;
    function __construct(){
        parent::__construct('Register');
        //valid confirm password
        $this->initErrorsRegister2();
        $this->getMyModal()->saveModel($this->initErrorsKeyPassword2($this->getMyModal()->getObj()));
        $this->loginAdmin('RegisterMessage');
    }
}
return new RegisterPost();
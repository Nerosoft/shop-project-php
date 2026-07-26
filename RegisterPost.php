<?php 
include 'auth/SessionAdmin.php';
// require 'auth/test_session3.php';
class RegisterPost extends ModelJson{
    function __construct(){
        parent::__construct('Register', null, null, ModelJson::getRandomKey());
        //valid confirm password
        $this->initErrorsRegister2();
        $this->saveModel($this->initErrorsKeyPassword2($this->getObj()));
        $this->loginAdmin('RegisterMessage');
    }
}
return new RegisterPost();
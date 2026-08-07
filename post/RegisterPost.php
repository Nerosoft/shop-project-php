<?php 
// require 'auth/test_session3.php';
class RegisterPost extends ModelJson{
    function __construct(){
        parent::__construct('Register');
    }
    function getView(){
        //valid confirm password
        $this->initErrorsRegister2();
        $this->saveModel($this->initErrorsKeyPassword2($this->getObj()));
    }
}
$view = new RegisterPost();
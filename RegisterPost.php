<?php 
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'MyRegister.php';
    require 'ValidationLoginRegister.php';
    class RegisterPost extends ValidationLoginRegister{
        use ErrorRegister;
        function __construct(){
            parent::__construct('Register');
            $this->initErrorsRegister($this->getModelPage());
            if(isset($_POST['Email']) && in_array($_POST['Email'], array_map(function($obj) {return $obj->getName();}, $this->getUsers())))
                MyRegister::initMyRegister($this->getModelPage()['EmailExist'], 'danger');
            else if(!isset($_POST['password_confirmation']) || $_POST['password_confirmation'] === '')
                MyRegister::initMyRegister($this->getRequiredConfirmPassword(), 'danger');
            else if(strlen($_POST['password_confirmation']) < 8)
                MyRegister::initMyRegister($this->getInvalidConfirmPassword(), 'danger');
            else if($_POST['Password'] !== $_POST['Password'] && strlen($_POST['Password']) >= 8)
                MyRegister::initMyRegister($this->getPasswordDosNotMatch(), 'danger');
            if(!isset($_POST['Key']) || $_POST['Key'] === '')
                MyRegister::initMyRegister($this->getRequiredKeyPassword(), 'danger');
            else if(strlen($_POST['Key']) < 8)
                MyRegister::initMyRegister($this->getInvalidKeyPassword(), 'danger');
            else{
                $allUsers = $this->getObj();
                $allUsers['Users'][$this->getRandomId()] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                $this->saveModel($allUsers);
                $this->redirectToAdminPage();
            }
        }
    }
    new RegisterPost();    
}else
    header('LOCATION:Register.php');
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
            $this->getEmailExist();
            if(!isset($_POST['password_confirmation']) || $_POST['password_confirmation'] === '')
                $this->setErrors($this->getRequiredConfirmPassword());
            else if(strlen($_POST['password_confirmation']) < 8)
                $this->setErrors($this->getInvalidConfirmPassword());
            else if($_POST['Password'] !== $_POST['Password'] && strlen($_POST['Password']) >= 8)
                $this->setErrors($this->getPasswordDosNotMatch());
            if(!isset($_POST['Key']) || $_POST['Key'] === '')
                $this->setErrors($this->getRequiredKeyPassword());
            else if(strlen($_POST['Key']) < 8)
                $this->setErrors($this->getInvalidKeyPassword());
            else if($this->isEmptyErrors()){
                $allUsers = $this->getObj();
                $allUsers['Users'][$this->getRandomId()] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                $this->saveModel($allUsers);
                $this->redirectToAdminPage();
            }
            $view = new MyRegister();
            $this->displayErrors();
            include 'register_view.php';
        }
    }
    new RegisterPost();    
}else
    header('LOCATION:Register.php');
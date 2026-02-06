<?php
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'MyLogin.php';
    require 'ValidationLoginRegister.php';
    class LoginForgetPasswordPost extends ValidationLoginRegister{
        use ErrorsKeyPassword;
        function __construct(){
            parent::__construct('Login');
            $this->validKeyPassword($this->getMyModal());
            foreach ($this->getUsers() as $key => $user) 
                if($user->getName() === $_POST['Email'] && $user->getKey() === $_POST['Key']){
                    $myData = $this->getObj();
                    $myData['Users'][$key] = array("Email"=>$user->getName(), "Password"=>$_POST["Password"], "Key"=>$user->getKey());
                    $this->saveModel($myData);
                    $this->redirectToAdminPage();
                }
            MyLogin::initMyLogin('ForgetPasswordMessageInvlid', 'danger');
        }
    }
    new LoginForgetPasswordPost();
}else
    header('LOCATION:Login.php');
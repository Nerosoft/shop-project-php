<?php
include 'auth/SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'ValidationId.php';
    class LoginForgetPasswordPost extends ValidationId{
        use ErrorsEmailPassword;
        function __construct(){
            parent::__construct('Login');
            $myData = $this->getObj();
            if(isset($myData['Users']))
                //valid key email and email
                foreach ($myData['Users'] as $key => $user) 
                    if($user['Email'] === $_POST['Email'] && $user['Key'] === $_POST['Key']){
                        // $myData = $this->getObj();
                        $myData['Users'][$key] = array("Email"=>$user['Email'], "Password"=>$_POST["Password"], "Key"=>$user['Key']);
                        $this->saveModel($myData);
                        $this->redirectToAdminPage();
                    }
            LoginRegister::initMyLoginRegister(false, 'ForgetPasswordMessageInvlid', 'danger');
        }
    }
    new LoginForgetPasswordPost();
}else
    header('LOCATION:Login');
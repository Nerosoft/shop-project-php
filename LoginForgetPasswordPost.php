<?php
include 'auth/SessionAdmin.php';
class LoginForgetPasswordPost extends ModelJson{
    use ErrorsEmailPassword;
    function __construct(){
        parent::__construct('Login');
        $myData = $this->getObj();
        if(isset($myData['Users']))
            //valid key email and email
            foreach ($myData['Users'] as $key => $user) 
                if($user['Email'] === $_POST['Email'] && $user['Key'] === $_POST['Key']){
                    $myData['Users'][$key] = array("Email"=>$user['Email'], "Password"=>$_POST["Password"], "Key"=>$user['Key']);
                    $this->saveModel($myData);
                    $this->loginAdmin('ForgetMessage');
                }
        $this->showError($this->getModelPage()['ForgetPasswordMessageInvlid']);
    }
}
return new LoginForgetPasswordPost();
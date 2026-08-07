<?php
// require 'auth/test_session3.php';
class LoginForgetPasswordPost extends ModelJson{
    function __construct(){
        parent::__construct('Login');
    }
    function getView(){
        $myData = $this->getObj();
        if(isset($myData['Users']))
            //valid key email and email
            foreach ($myData['Users'] as $key => $user) 
                if($user['Email'] === $_POST['Email'] && $user['Key'] === $_POST['Key']){
                    $myData['Users'][$key] = array("Email"=>$user['Email'], "Password"=>$_POST["Password"], "Key"=>$user['Key']);
                    $this->saveModel($myData);
                    return;
                }
        $this->showError($this->getModelPage()['ForgetPasswordMessageInvlid']);
    }
}
$view = new LoginForgetPasswordPost();
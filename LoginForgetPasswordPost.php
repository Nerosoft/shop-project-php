<?php
include 'auth/SessionAuth.php';
ModelJson::initView('Login', 'ForgetMessage', 'success', function(){
    class LoginForgetPasswordPost extends ValidationId{
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
                        return;
                    }
            ModelJson::initView2($this->getUrlName2(), 'ForgetPasswordMessageInvlid');
        }
    }
    return new LoginForgetPasswordPost();
}, 'ForgetMessage');

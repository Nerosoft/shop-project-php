<?php
include 'auth/SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('Login', 'LoginMessage', 'success', function(){
    class LoginPost extends ValidationId{
        use ErrorsEmailPassword;
        function __construct(){
            parent::__construct('Login');
            if(isset($this->getObj()['Users']))
                foreach ($this->getObj()['Users'] as $key => $value)
                    if($value['Email'] === $_POST['Email'] && $value['Password'] === $_POST['Password'])
                        return;
            ModelJson::initView2($this->getUrlName2(), 'EmailPassword');
        }
    }
    return new LoginPost();
}, 'LoginMessage');
}else
    header('LOCATION:Login');
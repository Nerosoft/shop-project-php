<?php
include 'auth/SessionAdmin.php';
// require 'auth/test_session3.php';
class LoginPost extends ModelJson{
    function __construct(){
        parent::__construct('Login');
        if(isset($this->getObj()['Users']))
            foreach ($this->getObj()['Users'] as $key => $value)
                if($value['Email'] === $_POST['Email'] && $value['Password'] === $_POST['Password'])
                    $this->loginAdmin();
        $this->showError($this->getModelPage()['EmailPassword']);
    }
}
new LoginPost();
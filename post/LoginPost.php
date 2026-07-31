<?php
// require 'auth/test_session3.php';
class LoginPost extends ModelJson{
    function __construct(){
        parent::__construct('Login');
    }
    function getView(){
        if(isset($this->getObj()['Users']))
            foreach ($this->getObj()['Users'] as $key => $value)
                if($value['Email'] === $_POST['Email'] && $value['Password'] === $_POST['Password'])
                    $this->loginAdmin();
        $this->showError($this->getModelPage()['EmailPassword']);
    }
}
$view = new LoginPost();
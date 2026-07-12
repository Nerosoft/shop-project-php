<?php
include 'auth/SessionAdmin.php';
class LoginPost extends ModelJson{
    use ErrorsEmailPassword;
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
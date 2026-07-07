<?php
include 'auth/SessionPost.php';
class LoginPost extends ValidationId{
    use ErrorsEmailPassword;
    function __construct(){
        parent::__construct(null, null, 'Login');
        if(isset($this->getObj()['Users']))
            foreach ($this->getObj()['Users'] as $key => $value)
                if($value['Email'] === $_POST['Email'] && $value['Password'] === $_POST['Password'])
                    $this->loginAdmin();
        $this->showError($this->getModelPage()['EmailPassword']);
    }
}
new LoginPost();
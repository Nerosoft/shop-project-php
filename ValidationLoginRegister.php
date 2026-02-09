<?php
require 'DeleteInfoName.php';
require 'Users.php';
class ValidationLoginRegister extends ModelJson{
    use ErrorsEmailPassword;
    private $users;
    function getUsers(){
        return $this->users;
    }
    function redirectToAdminPage(){
        $_SESSION['userId'] = $_POST['superId'];
        foreach ($this->getFile() as $key => $obj)
            if($key === $_POST['superId'] || isset($obj['Branches']) && in_array($_POST['superId'], array_keys($obj['Branches']))){
                $_SESSION['staticId'] = $key;
                header('LOCATION:index');
                exit;
            }
    }
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->users = isset($this->getObj()['Users']) ? Users::fromArray($this->getObj()['Users']):array();
        $this->initErrorsEmailPassword2($this->getMyModal(), $this->users);
    }
}
?>
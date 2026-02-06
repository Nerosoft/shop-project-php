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
                header('Location:Home.php');
                exit;
            }
    }
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->validStaticId();
        $this->users = isset($this->getObj()['Users']) ? Users::fromArray($this->getObj()['Users']):array();
        $this->initErrorsEmailPassword2($this->getMyModal(), $this->users);
        // if(!isset($_POST['Email']) || $_POST['Email'] === '')
        //     $this->initViewPost($this->getRequiredEmail());
        // else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
        //     $this->initViewPost($this->getInvalidEmail());
        // if(!isset($_POST['Password']) || $_POST['Password'] === '')
        //     $this->initViewPost($this->getRequiredPassword());
        // else if(strlen($_POST['Password']) < 8)
        //     $this->initViewPost($this->getInvalidPassword());
    }
}
?>
<?php
require 'DeleteInfoName.php';
require 'Users.php';
require 'MessageError.php';
class ValidationLoginRegister extends MessageError{
    use ErrorLoginRegister;
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
        $this->initErrorsLoginRegister($this->getModelPage());
        $this->users = isset($this->getObj()['Users']) ? Users::fromArray($this->getObj()['Users']):array();
        if(!isset($_POST['Email']) || $_POST['Email'] === '')
            $this->setErrors($this->getRequiredEmail());
        else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
            $this->setErrors($this->getInvalidEmail());
        if(!isset($_POST['Password']) || $_POST['Password'] === '')
            $this->setErrors($this->getRequiredPassword());
        else if(strlen($_POST['Password']) < 8)
            $this->setErrors($this->getInvalidPassword());
    }
    function getEmailExist(){
        if(isset($_POST['Email']) && in_array($_POST['Email'], array_map(function($obj) {return $obj->getName();}, $this->getUsers())))
            $this->setErrors($this->getModelPage()['EmailExist']);
    }
}
?>
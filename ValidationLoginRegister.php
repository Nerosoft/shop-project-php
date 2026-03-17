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
        if(isset($this->getFile()[$_POST['superId']]) && isset($this->getFile()[$_POST['superId']]['Branches']))
            $this->loginAdmin($_POST['superId'], $_POST['superId']);
        else
            foreach ($this->getFile() as $key => $obj)
                if(isset($obj['Branches']) && in_array($_POST['superId'], array_keys($obj['Branches'])))
                    $this->loginAdmin($_POST['superId'], $key);        
    }
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->users = isset($this->getObj()['Users']) ? Users::fromArray($this->getObj()['Users']):array();
        $this->initErrorsEmailPassword3($this->getMyModal());
    }
}
?>
<?php
trait ErrorsEmailPassword{
    private $RequiredEmail;
    private $InvalidEmail;
    private $RequiredPassword;
    private $InvalidPassword;
    public function initErrorsEmailPassword($error){
        $this->RequiredEmail = $error['RequiredEmail'];
        $this->InvalidEmail = $error['InvalidEmail'];
        $this->RequiredPassword = $error['RequiredPassword'];
        $this->InvalidPassword = $error['InvalidPassword'];
    }
    //setup project no valid email exist
    function initErrorsEmailPassword3($modal){
        $this->initErrorsEmailPassword($modal->getModelPage());
        if(!isset($_POST['Email']) || $_POST['Email'] === '')
            $modal->initViewPost($this->getRequiredEmail());
        else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
            $modal->initViewPost($this->getInvalidEmail());
        else if(!isset($_POST['Password']) || $_POST['Password'] === '')
            $modal->initViewPost($this->getRequiredPassword());
        else if(strlen($_POST['Password']) < 8)
            $modal->initViewPost($this->getInvalidPassword());
    }
    function getRequiredEmail(){
        return $this->RequiredEmail;
    }
    function getInvalidEmail(){
        return $this->InvalidEmail;
    }
    function getRequiredPassword(){
        return $this->RequiredPassword;
    }
    function getInvalidPassword(){
        return $this->InvalidPassword;
    }
    function loginAdmin($userId, $staticId){
        $_SESSION['userId'] = $userId;
        $_SESSION['staticId'] = $staticId;
        header('LOCATION:index');
        exit;
    }
}
<?php
class Login extends ModelJson{
    function __construct(){
        parent::__construct('Login', 'LoginPost');
    }
    function getView(){
        include 'pis_of_page/login_register.php';
        echo <<<HTML
        <button onclick="openForm('#forgetpasswordmodal')" type="button" class="btn btn-success" >{$this->getButtonForgetPassword()}</button>
        HTML;
        $this->makeCreateModalForgetPass($this->getModalForgetPasswordTitle(), $this->getModalForgetPasswordButton(), "forgetpasswordmodal", null, null, 'LoginForgetPasswordPost.php');
        include 'pis_of_page/buttons.php';    
    }

    function getButtonForgetPassword(){
        return $this->getModelPage()['ButtonForgetPassword'];
    }
    function getModalForgetPasswordTitle(){
        return $this->getModelPage()['ModalForgetPasswordTitle'];
    }
    function getModalForgetPasswordButton(){
        return $this->getModelPage()['ModalForgetPasswordButton'];
    }
      
}
$view = new Login();

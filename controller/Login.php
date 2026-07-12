<?php
class Login extends ModelJson{
    use ErrorBranch, InfoBranch, EmailPassword;
    private $ButtonForgetPassword;
    private $ModalForgetPasswordTitle;
    private $ModalForgetPasswordButton;
    function __construct(){
        parent::__construct('Login', 'LoginPost');
        $this->ButtonForgetPassword = $this->getModelPage()['ButtonForgetPassword'];
        $this->ModalForgetPasswordTitle = $this->getModelPage()['ModalForgetPasswordTitle'];
        $this->ModalForgetPasswordButton = $this->getModelPage()['ModalForgetPasswordButton'];
    }
    function getButtonForgetPassword(){
        return $this->ButtonForgetPassword;
    }
    function getModalForgetPasswordTitle(){
        return $this->ModalForgetPasswordTitle;
    }
    function getModalForgetPasswordButton(){
        return $this->ModalForgetPasswordButton;
    }
}
$view = new Login();
include 'pis_of_page/buttons.php';
echo <<<HTML
<button onclick="openForm('#forgetpasswordmodal')" type="button" class="btn btn-success" >{$view->getButtonForgetPassword()}</button>
HTML;
$view->makeCreateModal($view, $view->getModalForgetPasswordTitle(), $view->getModalForgetPasswordButton(), "forgetpasswordmodal", null, null, 'LoginForgetPasswordPost.php');
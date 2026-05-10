<?php
require 'InformationPage.php';
require 'all_trait/ErrorBranch.php';
require 'all_trait/InfoBranch.php';
require 'all_trait/InterEmailPass.php';
require 'all_trait/ErrorActiveStyleLang.php';
class LoginRegister extends InformationPage{
    use ErrorBranch, InfoBranch, EmailPassword, ErrorActiveStyleLang;
    private $TitleForm;
    private $ButtonName;
    private $dbKeys;
    private $dbBranchKeys;
    private $DbKeyLabel;
    private $AppLabel;
    private $AllBranch;
    private $ModalTitleProject;
    private $ModalButtonProject;
    private $ButtonSetupProject;
    private $RegisterLoginPage;
    private $ButtonForgetPassword;
    private $ModalForgetPasswordTitle;
    private $ModalForgetPasswordButton;
    function getModalTitleProject(){
        return $this->ModalTitleProject;
    }
    function getModalButtonProject(){
        return $this->ModalButtonProject;
    }
    function getButtonSetupProject(){
        return $this->ButtonSetupProject;
    }
    function getAllBranch(){
        return $this->AllBranch;
    }
    function getAppLabel(){
        return $this->AppLabel;
    }
    function getDbKeys(){
        return $this->dbKeys;
    }
    function getDbBranchKeys(){
        return $this->dbBranchKeys;
    }
    function getRegisterLoginPage(){
        return $this->RegisterLoginPage;
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
    function __construct($message = 'LoadMessage', $type = 'success', $IdPage = 'Login', $action = 'LoginPost.php'){
        parent::__construct($IdPage, $message, $type);
        $this->initInfoBranch($this->getMyModal());
        $this->initErrorBranch($this->getModelPage());
        $this->initEmailPassword($this->getModelPage());
        $this->ButtonForgetPassword = $this->getModelPage()['ButtonForgetPassword'];
        $this->ModalForgetPasswordTitle = $this->getModelPage()['ModalForgetPasswordTitle'];
        $this->ModalForgetPasswordButton = $this->getModelPage()['ModalForgetPasswordButton'];
        $this->TitleForm = $this->getModelPage()['TitleForm'];
        $this->ButtonName = $this->getModelPage()['ButtonName'];
        $this->DbKeyLabel = $this->getModelPage()['DbKeyLabel'];
        $this->AppLabel = $this->getModelPage()['AppLabel'];
        $this->AllBranch = $this->getModelPage()['AllBranch'];
        $this->ModalTitleProject = $this->getModelPage()['ModalTitleProject'];
        $this->ModalButtonProject = $this->getModelPage()['ModalButtonProject'];
        $this->ButtonSetupProject = $this->getModelPage()['ButtonSetupProject'];
        $this->RegisterLoginPage = $this->getModelPage()['RegisterLoginPage'];
        foreach ($this->getFile() as $key => $obj)
            if(isset($obj['Branches'])){
                $this->dbKeys[$key] = $obj['Branches'];
                if(count($obj['Branches']) > 1 && isset($obj['Branches'][$this->getId()]))
                    $this->dbBranchKeys = $obj['Branches'];
            }
        echo<<<HTML
            <div class="container">
                <div class="register">
                    <form id='register' method='POST' action="{$action}">
        HTML; 
        $view = $this;
        include 'pis_of_page/login_form.php';       
    }
    function getDbKeyLabel(){
        return $this->DbKeyLabel;
    }
    function getTitleForm(){
        return $this->TitleForm;
    }
    function getButtonName(){
        return $this->ButtonName;
    }
}

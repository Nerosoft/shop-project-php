<?php
require 'InformationPage.php';
require 'all_trait/ErrorBranch.php';
require 'all_trait/InfoBranch.php';
require 'all_trait/InterEmailPass.php';
class LoginRegister extends InformationPage{
    use ErrorBranch, InfoBranch, EmailPassword;
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

    private $BranchLabel;
    private $ChangeStyleButton;
    private $ChangeLanguageButton;
    function getBranchLabel(){
        return $this->BranchLabel;
    }
    function getChangeStyleButton(){
        return $this->ChangeStyleButton;
    }
    function getChangeLanguageButton(){
        return $this->ChangeLanguageButton;
    }


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
    function __construct($message, $type, $IdPage = 'Login', $action = 'LoginPost.php'){
        parent::__construct($IdPage, $message, $type);
        $this->BranchLabel = $this->getModelPage()['BranchLabel'];
        $this->ChangeStyleButton = $this->getModelPage()['ChangeStyleButton'];
        $this->ChangeLanguageButton = $this->getModelPage()['ChangeLanguageButton'];
        if($IdPage !== 'Site' ){
            echo '<link href="./asset/css/login_register.css" rel="stylesheet"></head><body>';
            $this->initInfoBranch();
            $this->initErrorBranch();
            $this->initEmailPassword();
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
                    $this->dbKeys[$key] = new branch($obj['Branches'][$key]['Name']);
                    // $this->dbKeys[$key] = $obj['Branches'];
                    if(isset($obj['Branches'][$this->getId()]))
                        $this->dbBranchKeys = $key;
                        // $this->dbBranchKeys = $obj['Branches'];
                }
            echo<<<HTML
                <div class="container">
                    <div id="createModel" class="register">
                        <form method='POST' action="{$action}">
            HTML; 
            $view = $this;
            include 'pis_of_page/login_form.php';
        }else
            echo '<link rel="stylesheet" href="./asset/css/aos.css">
                <link rel="stylesheet" href="./asset/css/owl.carousel.min.css">
                <link rel="stylesheet" href="./asset/css/owl.theme.default.min.css">
                <link rel="stylesheet" href="./asset/css/templatemo-digital-trend.css"></head><body>';
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

<?php
// require 'all_trait/ErrorBranch.php';
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
    private $BranchProjectTitle;
    private $BranchProjectButton;
    private $ActiveBranchProject;
    function getActiveBranchProject(){
        return $this->ActiveBranchProject;
    }
    function getBranchProjectTitle(){
        return $this->BranchProjectTitle;
    }
    function getBranchProjectButton(){
        return $this->BranchProjectButton;
    }
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
    function __construct($idPage, $action = 'LoginPost.php'){
        parent::__construct($idPage, 'ChangeLangPost?id='.$idPage);
        $this->BranchLabel = $this->getModelPage()['BranchLabel'];
        $this->ChangeStyleButton = $this->getModelPage()['ChangeStyleButton'];
        $this->ChangeLanguageButton = $this->getModelPage()['ChangeLanguageButton']; foreach ($this->getFile() as $key => $obj)
        foreach ($this->getFile() as $key => $obj)
            if(isset($obj['Branches'])){
                $this->dbKeys[$key] = new branch($obj['Branches'][$key]['Name']);
                if(isset($obj['Branches'][$this->getId()]))
                    $this->dbBranchKeys = $key;
            }
        echo '<link href="./asset/css/login_register.css" rel="stylesheet"></head><body>';
        $this->initInfoBranch();
        $this->initErrorBranch();
        $this->initEmailPassword();
        $this->BranchProjectTitle = $this->getModelPage()['BranchProjectTitle'];
        $this->BranchProjectButton = $this->getModelPage()['BranchProjectButton'];
        $this->ActiveBranchProject = $this->getModelPage()['ActiveBranchProject'];
        $this->TitleForm = $this->getModelPage()['TitleForm'];
        $this->ButtonName = $this->getModelPage()['ButtonName'];
        $this->DbKeyLabel = $this->getModelPage()['DbKeyLabel'];
        $this->AppLabel = $this->getModelPage()['AppLabel'];
        $this->AllBranch = $this->getModelPage()['AllBranch'];
        $this->ModalTitleProject = $this->getModelPage()['ModalTitleProject'];
        $this->ModalButtonProject = $this->getModelPage()['ModalButtonProject'];
        $this->ButtonSetupProject = $this->getModelPage()['ButtonSetupProject'];
        $this->RegisterLoginPage = $this->getModelPage()['RegisterLoginPage'];
        
        echo<<<HTML
            <div class="container">
                <div id="createModel" class="register">
                    <form method='POST' action="{$action}">
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

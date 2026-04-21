<?php
require 'InformationPage.php';
require 'ErrorBranch.php';
require 'InfoBranch.php';
require 'InterEmailPass.php';
require 'ErrorActiveStyleLang.php';
class LoginRegister extends InformationPage{
    use ErrorBranch, InfoBranch, EmailPassword, ErrorActiveStyleLang;
    private $TitleForm;
    private $ButtonName;
    private $ChangeLanguageButton;
    private $ChangeStyleButton;
    private $dbKeys;
    private $dbBranchKeys;
    private $DbKeyLabel;
    private $AppLabel;
    private $BranchLabel;
    private $AllBranch;
    private $ModalTitleProject;
    private $ModalButtonProject;
    private $ButtonSetupProject;
    private $RegisterLoginPage;
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
    function getBranchLabel(){
        return $this->BranchLabel;
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
    function __construct($IdPage, $message, $type){
        parent::__construct($IdPage, $message, $type);
        $this->initInfoBranch($this->getMyModal());
        $this->initErrorBranch($this->getModelPage());
        $this->initEmailPassword($this->getModelPage());
        $this->TitleForm = $this->getModelPage()['TitleForm'];
        $this->ButtonName = $this->getModelPage()['ButtonName'];
        $this->ChangeLanguageButton = $this->getModelPage()['ChangeLanguageButton'];
        $this->ChangeStyleButton = $this->getModelPage()['ChangeStyleButton'];
        $this->DbKeyLabel = $this->getModelPage()['DbKeyLabel'];
        $this->AppLabel = $this->getModelPage()['AppLabel'];
        $this->BranchLabel = $this->getModelPage()['BranchLabel'];
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
    }
    function getDbKeyLabel(){
        return $this->DbKeyLabel;
    }
    function getChangeStyleButton(){
        return $this->ChangeStyleButton;
    }
    function getChangeLanguageButton(){
        return $this->ChangeLanguageButton;
    }
    function getTitleForm(){
        return $this->TitleForm;
    }
    function getButtonName(){
        return $this->ButtonName;
    }
}

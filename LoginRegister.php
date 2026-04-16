<?php
require 'InformationPage.php';
require 'ErrorBranch.php';
require 'InfoBranch.php';
require 'InterEmailPass.php';
require 'ErrorActiveStyleLang.php';
class LoginRegister extends InformationPage{
    use ErrorBranch, InfoBranch, EmailPassword, ErrorActiveStyleLang;
    private $Style;
    private $TitleForm;
    private $ButtonName;
    private $MyLanguage;
    private $ChangeLanguageButton;
    private $ChangeStyleButton;
    private $ModelTitle;
    private $ModelButton;
    private $dbKeys;
    private $dbBranchKeys;
    private $DbKeyLabel;
    private $AppLabel;
    private $BranchLabel;
    private $AllBranch;
    private $ModalTitleProject;
    private $ModalButtonProject;
    private $ButtonSetupProject;
    private $ModalTitleStyle;
    private $ModalButtonStyle;
    private $RegisterLoginPage;
    function getModalTitleStyle(){
        return $this->ModalTitleStyle;
    }
    function getModalButtonStyle(){
        return $this->ModalButtonStyle;
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
    function callAllFunction(){
        $this->initInfoBranch($this->getMyModal());
        $this->initErrorBranch($this->getModelPage());
        $this->initEmailPassword($this->getModelPage());
        $this->initErrorActiveStyleLang();
        $this->callAllFunction2();
    }
    function __construct($IdPage, $message, $type){
        parent::__construct($IdPage);
        $this->Style = MyLanguage::fromArray($this->getModel2()['Style']);
        $this->ModalTitleStyle = $this->getModelPage()['ModalTitleStyle'];
        $this->ModalButtonStyle = $this->getModelPage()['ModalButtonStyle'];
        $this->TitleForm = $this->getModelPage()['TitleForm'];
        $this->MyLanguage = MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']);
        $this->ButtonName = $this->getModelPage()['ButtonName'];
        $this->ChangeLanguageButton = $this->getModelPage()['ChangeLanguageButton'];
        $this->ChangeStyleButton = $this->getModelPage()['ChangeStyleButton'];
        $this->ModelTitle = $this->getModelPage()['ModelTitle'];
        $this->ModelButton = $this->getModelPage()['ModelButton'];
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
        include 'title_html.php';
        $this->showToast($this->getModelPage()[$message]??$message, $type);
        $this->initEvent('createModel', 'createForm', $this->getLanguage(), $this->getChangeLang(), $this->getModelTitle(), $this->getModelButton(), 'lang', $this->getMyLanguage());
        $this->initEvent('style_modal', 'style_form', $this->getStyleFile(), $this->getChangeStyle(), $this->getModalTitleStyle(), $this->getModalButtonStyle(), 'style', $this->getStyle());
        $this->initScriptStyleLang();
    }
    function getStyle(){
        return $this->Style;
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
    function getModelTitle(){
        return $this->ModelTitle;
    }
    function getModelButton(){
        return $this->ModelButton;
    }
    function getMyLanguage(){
        return $this->MyLanguage;
    }
    function getTitleForm(){
        return $this->TitleForm;
    }
    function getButtonName(){
        return $this->ButtonName;
    }
}

<?php
require 'InformationPage.php';
require 'ErrorsHomeName.php';
require 'InfoHome.php';
require 'InterEmailPass.php';
class LoginRegister extends InformationPage{
    use ErrorsHomeName, InfoHome, EmailPassword;
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
    private $myIdBranch;
    private $AppLabel;
    private $BranchLabel;
    private $AllBranch;
    private $ModalTitleProject;
    private $ModalButtonProject;
    private $ButtonSetupProject;
    private $ModalTitleStyle;
    private $ModalButtonStyle;
    private $ChangeLang;
    private $ChangeStyle;

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
    function getMyIdBranch(){
        return $this->myIdBranch;
    }
    function getDbKeys(){
        return $this->dbKeys;
    }
    function getDbBranchKeys(){
        return $this->dbBranchKeys;
    }
    function getChangeLang(){
        return $this->ChangeLang;
    }
    function getChangeStyle(){
        return $this->ChangeStyle;
    }
    function __construct($IdPage, $message, $type){
        parent::__construct($IdPage);
        $this->initInfoHome($this->getModelPage());
        $this->initErrorsHomeName($this->getModelPage());
        $this->initEmailPassword($this->getModelPage());
        $this->ChangeLang = $this->getModelPage()['UsedLanguage'];
        $this->ChangeStyle = $this->getModelPage()['UsedStyle'];
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
        foreach ($this->getFile() as $key => $obj)
            if(isset($obj['State']) && $obj['State'] === 'admin'){
                $this->dbKeys[$key] = $obj[$obj['Setting']['Language']]['AppSettingAdmin']['AdminDashboard'];
                if($this->getId() === $key || isset($obj['Branches']) && in_array($this->getId(), array_keys($obj['Branches']))){
                    $this->myIdBranch = $key;
                    $this->dbBranchKeys[$key]['Name'] = $obj[$obj['Setting']['Language']]['AppSettingAdmin']['BranchMain'];
                    if(isset($obj['Branches']))
                        $this->dbBranchKeys = $this->dbBranchKeys + $obj['Branches'];
                    
                }
            }
        include 'title_html.php';
        $this->showToast($this->getModelPage()[$message]??$message, $type);
        $this->initEvent('createModel', 'createForm', $this->getLanguage(), $this->getChangeLang(), $this->getModelTitle(), $this->getModelButton(), 'lang', $this->getMyLanguage());
        $this->initEvent('style_modal', 'style_form', $this->getStyleFile(), $this->getChangeStyle(), $this->getModalTitleStyle(), $this->getModalButtonStyle(), 'style', $this->getStyle());
        echo <<<HTML
        <script type="text/javascript">
            function restValue(id, style_lang){
                closeForm(id);
                removeClass(id);
                if($(id).find('input[name="id"]:checked').val() !== style_lang)
                    $(id).find('.flexCheck').prop('checked', true);
            }
            function changeLangStyle(el, idForm, style_lang, idModal, error){
                validForm(idForm);
                if(el.value !== style_lang)
                    $(idModal).find('.flexCheck')[0].setCustomValidity('');
                else
                    el.setCustomValidity(error);
            }
            function sendLangStyle(idForm, idModel, style_lang, error){
                validForm(idForm);
                if($(idModel).find('input[name="id"]:checked').val() === style_lang)
                    $(idModel).find('input[name="id"]:checked')[0].setCustomValidity(error);
            }
        </script>
    HTML;
    }
    function initEvent($idModel, $idForm, $style_lang, $error, $title, $button, $state, $data){
        echo<<<HTML
        <div class="modal fade" id="{$idModel}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SettingLanguage">{$title}</h5>
                    <button type="button" id="close_button" onclick="restValue('#{$idModel}', '{$style_lang}')" class="btn btn-dark">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="{$idForm}" action="ChangeLangPost.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" value="{$this->getId()}" name="superId">
                    <input type="hidden"value="{$state}" name="state">
                    <input type="hidden" name="change_language" value="{$this->getUrlName2()}">

        HTML;
        foreach ($data as $key => $value)
            if($key === $style_lang)
                echo <<<HTML
                    <div class="form-check">
                    <input name="id" onchange="changeLangStyle(this, '#{$idForm}', '{$style_lang}', '#{$idModel}', '{$error}')" class="form-check-input flexCheck" value="{$key}" checked type="radio">
                    <label  class="form-check-label">
                    {$value->getName()}
                    </label>
                    </div>
                HTML;
            else
                echo <<<HTML
                    <div class="form-check">
                    <input name="id" onchange="changeLangStyle(this, '#{$idForm}', '{$style_lang}', '#{$idModel}', '{$error}')" class="form-check-input" value="{$key}" type="radio">
                    <label  class="form-check-label">
                    {$value->getName()}
                    </label>
                    </div>
                HTML;
        echo<<<HTML
            </div>
                <div class="modal-footer">
                <button type="submit" id="click_button" class="btn btn-primary" onclick="sendLangStyle('#{$idForm}', '#{$idModel}', '{$style_lang}', '{$error}')">{$button}</button>
                </div>
            </form>
            </div>
            </div>
            </div>
        HTML;
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

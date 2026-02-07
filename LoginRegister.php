<?php
require 'InformationPage.php';
require 'ErrorLangStyle.php';
require 'InterEmailPass.php';
class LoginRegister extends InformationPage implements EmailPassword{
    use ErrorLangStyle;
    private $TitleForm;
    private $LabelEmail;
    private $HintEmail;
    private $LabelPassword;
    private $HintPassword;
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
    private $NameLabel;
    private $NameHint;
    private $ButtonSetupProject;
    private $ModalTitleStyle;
    private $ModalButtonStyle;
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
    function getNameLabel(){
        return $this->NameLabel;
    }
    function getNameHint(){
        return $this->NameHint;
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

    function __construct($IdPage, $message, $type){
        parent::__construct($IdPage);
        $this->initErrorLangStyle($this->getModelPage());
        $this->ModalTitleStyle = $this->getModelPage()['ModalTitleStyle'];
        $this->ModalButtonStyle = $this->getModelPage()['ModalButtonStyle'];
        $this->TitleForm = $this->getModelPage()['TitleForm'];
        $this->LabelEmail = $this->getModelPage()['LabelEmail'];
        $this->HintEmail = $this->getModelPage()['HintEmail'];
        $this->LabelPassword = $this->getModelPage()['LabelPassword'];
        $this->HintPassword = $this->getModelPage()['HintPassword'];
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
        $this->NameLabel = $this->getModelPage()['NameLabel'];
        $this->NameHint = $this->getModelPage()['NameHint'];
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
    }
    function initEvent($idModel, $idForm, $style_lang, $error, $title, $button, $state, $data){
        $action = 'ChangeLangPost.php';
        include('start_model.php');
        echo '<input type="hidden" value="'.$this->getId().'" name="superId">
        <input type="hidden"value="'.$state.'" name="state">
        <input type="hidden" name="change_language" value="'.$this->getUrlName2().'">';
        foreach ($data as $key => $value)
            if($key === $style_lang)
                echo <<<HTML
                    <div class="form-check">
                    <input name="id" class="form-check-input flexCheck" value="{$key}" checked type="radio">
                    <label  class="form-check-label">
                    {$value->getName()}
                    </label>
                    </div>
                HTML;
            else
                echo <<<HTML
                    <div class="form-check">
                    <input name="id" class="form-check-input" value="{$key}" type="radio">
                    <label  class="form-check-label">
                    {$value->getName()}
                    </label>
                    </div>
                HTML;
        include('end_model.php');

        echo <<<HTML
            <script type="text/javascript">
            $('#{$idModel}').find('#close_button').on('click', function() {
                    removeClass('#{$idModel}');
                    if($('#{$idModel}').find('input[name="id"]:checked').val() !== '{$style_lang}')
                        $('#{$idModel}').find('.flexCheck').prop('checked', true);
            });
                $('#{$idModel}').find('input[name="id"]').on('change', function(){
                    validForm('#{$idForm}');
                    if(this.value !== '{$style_lang}')
                        $('#{$idModel}').find('.flexCheck')[0].setCustomValidity('');
                    else
                        this.setCustomValidity('{$error}');
                });
                $('#{$idModel}').find('#click_button').on('click', function(){
                    if($('#{$idModel}').find('input[name="id"]:checked').val() === '{$style_lang}')
                        $('#{$idModel}').find('input[name="id"]:checked')[0].setCustomValidity('{$error}');
                });
            </script>
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
    function getLabelEmail(){
        return $this->LabelEmail;
    }
    function getHintEmail(){
        return $this->HintEmail;
    }
    function getLabelPassword(){
        return $this->LabelPassword;
    }
    function getHintPassword(){
        return $this->HintPassword;
    }
    function getButtonName(){
        return $this->ButtonName;
    }
}

<?php
trait ErrorActiveStyleLang{
    private $ChangeLang;
    private $ChangeStyle;
    private $ModelTitle;
    private $ModelButton;
    private $ModalTitleStyle;
    private $ModalButtonStyle;
    private $Style;
    private $MyLanguage;
    private $BranchLabel;
    private $ChangeStyleButton;
    private $ChangeLanguageButton;
    function initErrorActiveStyleLang(){
        $this->ModelTitle = $this->getModelPage()['ModelTitle'];
        $this->ModelButton = $this->getModelPage()['ModelButton'];
        $this->ModalTitleStyle = $this->getModelPage()['ModalTitleStyle'];
        $this->ModalButtonStyle = $this->getModelPage()['ModalButtonStyle'];
        $this->Style = MyLanguage::fromArray($this->getModel2()['Style']);
        $this->MyLanguage = MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']);
        $this->BranchLabel = $this->getModelPage()['BranchLabel'];
        $this->ChangeLanguageButton = $this->getModelPage()['ChangeLanguageButton'];
        $this->ChangeStyleButton = $this->getModelPage()['ChangeStyleButton'];
        $this->ChangeLang = $this->getModelPage()['UsedLanguage'];
        $this->ChangeStyle = $this->getModelPage()['UsedStyle'];
        $this->initEvent('createModel', 'createForm', $this->getLanguage(), $this->getChangeLang(), $this->getModelTitle(), $this->getModelButton(), 'AllNamesLanguage', $this->getMyLanguage());
        $this->initEvent('style_modal', 'style_form', $this->getStyleFile(), $this->getChangeStyle(), $this->getModalTitleStyle(), $this->getModalButtonStyle(), 'Style', $this->getStyle());
        $this->initScriptStyleLang();
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
    function getMyLanguage(){
        return $this->MyLanguage;
    }
    function getStyle(){
        return $this->Style;
    }
    function getModalButtonStyle(){
        return $this->ModalButtonStyle;
    }
    function getModalTitleStyle(){
        return $this->ModalTitleStyle;
    }
    function getModelButton(){
        return $this->ModelButton;
    }
    function getModelTitle(){
        return $this->ModelTitle;
    }
    function getChangeLang(){
        return $this->ChangeLang;
    }
    function getChangeStyle(){
        return $this->ChangeStyle;
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
            $view=$this;
            include 'all_modal/end_model.php';
    }
    function initScriptStyleLang(){
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
            $('#createModel,#style_modal').find('#click_button').on('click', function(){
                if($(this).parent().parent().attr('id') === 'createForm' && $('#createModel').find('input[name="id"]:checked').val() === '{$this->getLanguage()}'||
                    $(this).parent().parent().attr('id') === 'style_form' && $('#style_modal').find('input[name="id"]:checked').val() === '{$this->getStyleFile()}')
                    $('#'+$(this).parent().parent().attr('id')).find('input[name="id"]:checked')[0].setCustomValidity($(this).parent().parent().attr('id')==='createForm'?'{$this->getChangeLang()}':'{$this->getChangeStyle()}');
            });
        </script>
    HTML;
    }
}
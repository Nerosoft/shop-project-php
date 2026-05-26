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
        $view = $this;
        $idModel = 'createModel';
        $idForm = 'createForm';
        $style_lang = $this->getLanguage();
        $error = $this->getChangeLang();
        $title = $this->getModelTitle();
        $button = $this->getModelButton();
        $state = 'AllNamesLanguage';
        $data = $this->getMyLanguage();
        include 'all_modal/style_lang_form.php';
        $idModel = 'style_modal';
        $idForm = 'style_form';
        $style_lang = $this->getStyleFile();
        $error = $this->getChangeStyle();
        $title = $this->getModalTitleStyle();
        $button = $this->getModalButtonStyle();
        $state = 'Style';
        $data = $this->getStyle();  
        include 'all_modal/style_lang_form.php';
        echo <<<HTML
        <script type="text/javascript">
             $('#createModel,#style_modal').find('#close_button').on('click', function (){
                removeClass('#'+$(this).parent().parent().parent().parent().attr('id'));
                if($('#'+$(this).parent().parent().parent().parent().attr('id')).find('.flexCheck').val() !== $('#'+$(this).parent().parent().parent().parent().attr('id')).find('input[name="id"]:checked').val())
                    $('#'+$(this).parent().parent().parent().parent().attr('id')).find('.flexCheck').prop('checked', true);
            });
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
}
<?php
trait ErrorActiveStyleLang{
    private $ChangeLang;
    private $ModelTitle;
    private $ModelButton;
    private $MyLanguage;

    private $ChangeStyle;
    private $ModalTitleStyle;
    private $ModalButtonStyle;
    private $Style;

    
    function initErrorActiveStyleLang(){
        $this->ChangeLang = $this->getModelPage()['UsedLanguage'];
        $this->ModelTitle = $this->getModelPage()['ModelTitle'];
        $this->ModelButton = $this->getModelPage()['ModelButton'];
        $this->MyLanguage = MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']);
        
        $this->ChangeStyle = $this->getModelPage()['UsedStyle'];
        $this->ModalTitleStyle = $this->getModelPage()['ModalTitleStyle'];
        $this->ModalButtonStyle = $this->getModelPage()['ModalButtonStyle'];
        $this->Style = MyLanguage::fromArray($this->getModel2()['Style']);

        
       
        $view = $this;
        $idModel = 'lang_modal';
        $style_lang = $this->getLanguage();
        $error = $this->getChangeLang();
        $title = $this->getModelTitle();
        $button = $this->getModelButton();
        $state = 'AllNamesLanguage';
        $data = $this->getMyLanguage();
        include 'all_modal/style_lang_form.php';
        $idModel = 'style_modal';
        $style_lang = $this->getStyleFile();
        $error = $this->getChangeStyle();
        $title = $this->getModalTitleStyle();
        $button = $this->getModalButtonStyle();
        $state = 'Style';
        $data = $this->getStyle();  
        include 'all_modal/style_lang_form.php';
        echo <<<HTML
        <script type="text/javascript">
             $('#lang_modal,#style_modal').find('#close_button').on('click', function (){
                if($('#'+$(this).parent().parent().parent().parent().attr('id')).find('.flexCheck').val() !== $('#'+$(this).parent().parent().parent().parent().attr('id')).find('input[name="id"]:checked').val())
                    $('#'+$(this).parent().parent().parent().parent().attr('id')).find('.flexCheck').prop('checked', true);
            });
            function changeLangStyle(el, style_lang, idModal, error){
                validForm2(idModal);
                if(el.value !== style_lang)
                    $(idModal).find('.flexCheck')[0].setCustomValidity('');
                else
                    el.setCustomValidity(error);
            }
            $('#lang_modal,#style_modal').find('#click_button').on('click', function(){
                let idmodal = $(this).parent().parent().parent().parent().parent().attr('id');
                if(idmodal === 'lang_modal' && $('#lang_modal').find('input[name="id"]:checked').val() === '{$this->getLanguage()}'||
                    idmodal === 'style_modal' && $('#style_modal').find('input[name="id"]:checked').val() === '{$this->getStyleFile()}')
                    $('#'+idmodal).find('input[name="id"]:checked')[0].setCustomValidity(idmodal==='lang_modal'?'{$this->getChangeLang()}':'{$this->getChangeStyle()}');
            });
        </script>
        HTML;
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
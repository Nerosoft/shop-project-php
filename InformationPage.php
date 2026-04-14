<?php
require 'ModelJson.php';
require 'MyLanguage.php';
class InformationPage extends ModelJson{
    private $Title;
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->Title = $this->getModelPage()['Title'];
        include 'start_html.php';
    }
    function getTitle(){
        return $this->Title;
    }
    function setTitle($title){
        return $this->Title = $title;
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
            function sendLangStyle(idForm, idModel, style_lang, error){
                validForm(idForm);
                if($(idModel).find('input[name="id"]:checked').val() === style_lang)
                    $(idModel).find('input[name="id"]:checked')[0].setCustomValidity(error);
            }
        </script>
    HTML;
    }
}
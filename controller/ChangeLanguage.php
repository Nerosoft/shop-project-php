<?php
require 'page.php';
require 'all_trait/InfoChangeLangStyle.php';
class MyChangeLanguage extends Page{
    use InfoChangeLangStyle;
    private $SelectLang;
    function __construct($message, $type){
        parent::__construct('ChangeLanguage', $message, $type, function(){
            return array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']));
        }, MyLanguage::getKeysObject());
        $this->SelectLang = $this->getModelPage()['LanguageSelect'];
    }
    function getSelectLang(){
        return $this->SelectLang;
    }
    function makeCreateModal($view, $title, $button){
        $action = 'ChangeLanguageCreatePost.php';
        include('all_modal/modal_change_language.php');
        echo <<<HTML
            <div class="form-group">
                <label for="selectedLanguage">{$this->getSelectLang()}</label>
                <select
                title=""
                class="form-select" name="selectedLanguage"  aria-label="Default select example">
        HTML;
                foreach($this->getMyDataView() as $key=>$name){
                        $select = $key === $this->getLanguage()? 'selected' : '';
                        echo <<<HTML
                        <option {$select} value="{$key}">
                            {$name->getName()}
                        </option>
                        HTML;
                    }
        echo <<<HTML
                </select>
            </div>
        HTML;
        include('all_modal/end_model.php');
    }
}
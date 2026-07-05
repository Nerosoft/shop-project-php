<?php
require 'all_trait/InfoChangeLangStyle.php';
class MyChangeLanguage extends AdminMenu{
    use InfoChangeLangStyle;
    private $SelectLang;
    function __construct(){
        parent::__construct(function(){
            $this->SelectLang = $this->getModelPage()['LanguageSelect'];
            return array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']));
        }, MyLanguage::getKeysObject());
    }
    function getSelectLang(){
        return $this->SelectLang;
    }
    function makeCreateModal($view, $title, $button){
        $action = 'ChangeLanguageCreatePost.php';
        include('all_modal/modal_change_language.php');
        echo <<<HTML
            <div class="form-group">
                <i class="fa fa-language fa-2x"></i>
                <label for="selectedLanguage">{$view->getSelectLang()}</label>
                <select
                title=""
                class="form-select" name="selectedLanguage"  aria-label="Default select example">
        HTML;
                foreach($view->getMyDataView() as $key=>$name){
                        $select = $key === $view->getLanguage()? 'selected' : '';
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
$view = new MyChangeLanguage();
$myStateStyleLang ='AllNamesLanguage';
include 'pis_of_page/style_lang_view.php';
<?php
// require 'auth/test_session2.php';
class MyChangeLanguage extends ModelJson{
    function __construct(){
        parent::__construct('ChangeLanguage', function(){
            return array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']));
        }, MyLanguage::getKeysObject());
    }
    function getView(){
        $myStateStyleLang ='AllNamesLanguage';
        include 'pis_of_page/style_lang_view.php';
    }
    function getSelectLang(){
        return $this->getModelPage()['LanguageSelect'];
    }
    function makeCreateModal($title, $button){
        $action = 'ChangeLanguageCreatePost.php';
        include('all_modal/modal_change_language.php');
        echo <<<HTML
            <div class="form-group">
                <i class="fa fa-language fa-2x"></i>
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
new MyChangeLanguage();
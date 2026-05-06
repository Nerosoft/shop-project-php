<?php
require 'page.php';
require 'all_trait/InfoChangeLangStyle.php';
class MyChangeLanguage extends Page{
    use InfoChangeLangStyle;
    private $SelectLang;
    function __construct($message, $type){
        parent::__construct('ChangeLanguage', $message, $type);
        $this->SelectLang = $this->getModelPage()['LanguageSelect'];
    }
    function getSelectLang(){
        return $this->SelectLang;
    } 
    static function initMyChangeLanguage($message = 'LoadMessage', $type = 'success'){
        $view = new MyChangeLanguage($message, $type);
        echo<<<HTML
        <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')">{$view->getButtonModelCreate()}</button>
        HTML;
        $title = $view->getScreenModelCreate();
        $button = $view->getButtonModelAdd();
        $action = 'ChangeLanguageCreatePost.php';
        include('all_modal/modal_change_language.php');
        include 'views/ChangeLanguage_view.php';
        exit;
    }
}
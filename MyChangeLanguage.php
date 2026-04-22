<?php
require 'page.php';
require 'InfoChangeLangStyle.php';
class MyChangeLanguage extends Page{
    use InfoChangeLangStyle;
    private $AllBranches;
    private $SelectLang;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('ChangeLanguage', $message, $type);
        $this->AllBranches = $this->getModelPage()['AllBranches'];
        $this->SelectLang = $this->getModelPage()['LanguageSelect'];
    }
    function getSelectLang(){
        return $this->SelectLang;
    } 
    function getAllBranches(){
        return $this->AllBranches;
    } 
    static function initMyChangeLanguage($message = 'LoadMessage', $type = 'success'){
        $view = new MyChangeLanguage($message, $type);
        echo<<<HTML
        <button class="btn btn-primary" onClick="openForm('#createModel')">{$view->getButtonModelCreate()}</button>
        HTML;
        $title = $view->getScreenModelCreate();
        $button = $view->getButtonModelAdd();
        $action = 'ChangeLanguageCreatePost.php';
        include('modal_change_language.php');
        include 'ChangeLanguage_view.php';
        exit;
    }
}
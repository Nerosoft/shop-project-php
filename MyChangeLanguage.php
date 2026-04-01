<?php
require 'page.php';
require 'InfoChangeLangStyle.php';
class MyChangeLanguage extends Page{
    use InfoChangeLangStyle;
    private $AllBranches;
    private $SelectLang;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('ChangeLanguage', $message, $type);
        $this->InitInfoChangeLangStyle($this->getModelPage(), array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage'])), $this->getModel2()['AllNamesLanguage']);
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
        include 'ChangeLanguage_view.php';
        exit;
    }
}
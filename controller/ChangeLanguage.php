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
}
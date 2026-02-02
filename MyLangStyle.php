<?php
require 'AdminMenu.php';
require 'ErrorSystemlang.php';
class MyLangStyle extends AdminMenu{
    use ErrorSystemlang;
    private $LanguageName;
    private $LanguageValue;
    private $Text;
    private $WordHint;
    protected $DataView;
    function getLanguageName(){
        return $this->LanguageName;
    }
    function getLanguageValue(){
        return $this->LanguageValue;
    }
    function getText(){
        return $this->Text;
    }
    function getWordHint(){
        return $this->WordHint;
    }
    function __construct($keyPage, $message, $type){
        parent::__construct($keyPage, $message, $type);
        $this->initErrorSystemlang($this->getModelPage());
        $this->LanguageName = $this->getModelPage()['LanguageName'];
        $this->LanguageValue = $this->getModelPage()['LanguageValue'];
        $this->Text = $this->getModelPage()['Text'];
        $this->WordHint = $this->getModelPage()['WordHint'];
    }
    function getMyDataView(){
        return $this->DataView;
    }
}
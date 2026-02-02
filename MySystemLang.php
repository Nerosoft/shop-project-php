<?php
require 'AdminMenu.php';
require 'ErrorSystemlang.php';
class MySystemlang extends AdminMenu{
    use ErrorSystemlang;
    private $LanguageName;
    private $WordHint;
    private $Text;
    private $LanguageValue;
    private $DataView;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('SystemLang', $message, $type);
        $this->initErrorSystemlang($this->getModelPage());
        $this->Text = $this->getModelPage()['Text'];
        $this->LanguageValue = $this->getModelPage()['LanguageValue'];
        $this->LanguageName = $this->getModelPage()['LanguageName'];
        $this->WordHint = $this->getModelPage()['WordHint'];
        if(isset($_GET['lang']) && isset($_GET['table']) && isset($this->getObj()[$_GET['lang']][$_GET['table']]))
            $this->DataView = $this->getObj()[$_GET['lang']][$_GET['table']];
        else if(!(isset($_GET['lang']) && isset($_GET['table']))){
            $tableData = array();
            foreach ($this->getModel2()['AllNamesLanguage'] as $key=>$value)
                $tableData[$key] = $this->getObj()[$key];
            $this->DataView = $tableData;
        }
        else
            $this->DataView = array();
    }
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
    function getMyDataView(){
        return $this->DataView;
    }
}
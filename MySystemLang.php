<?php
require 'AdminMenu.php';
require 'ErrorSystemlang.php';
include 'InterfaceDataView.php';
class MySystemlang extends AdminMenu implements InterfaceDataView{
    use ErrorSystemlang;
    private $LanguageName;
    private $WordHint;
    private $Text;
    private $LanguageValue;
    private $DataView;
    private $ChangeAllLanguageSystem;
    function callAllFunction(){
        $this->initErrorSystemlang($this->getModelPage());
    }
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('SystemLang', $message, $type);
        // $this->initErrorSystemlang($this->getModelPage());
        $this->Text = $this->getModelPage()['Text'];
        $this->LanguageValue = $this->getModelPage()['LanguageValue'];
        $this->LanguageName = $this->getModelPage()['LanguageName'];
        $this->WordHint = $this->getModelPage()['WordHint'];
        $this->ChangeAllLanguageSystem = $this->getModelPage()['ChangeAllLanguageSystem'];
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
    static function initMySystemlang($message = 'LoadMessage', $type = 'success'){
        $view = new MySystemlang($message, $type);
        include 'SystemLang_view.php';
        exit;
    }
    function getAllBranches(){
        return $this->ChangeAllLanguageSystem;
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
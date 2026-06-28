<?php
require 'AdminMenu.php';
require 'all_trait/ErrorSystemlang.php';
include 'interface/InterfaceDataView.php';
class MySystemlang extends AdminMenu implements InterfaceDataView{
    use ErrorSystemlang;
    private $WordHint;
    private $Text;
    private $DataView;
    private $LanguageSelectAll;
    function getSelectAll(){
        return $this->LanguageSelectAll;
    }
    function __construct($message, $type){
        parent::__construct('SystemLang', $message, $type, function(){
            $this->initErrorSystemlang();
            $this->LanguageSelectAll = $this->getModelPage()['LanguageSelectAll'];
            $this->Text = $this->getModelPage()['Text'];
            $this->WordHint = $this->getModelPage()['WordHint'];
            if(isset($_GET['lang']) && isset($_GET['table']) && isset($this->getObj()[$_GET['lang']][$_GET['table']]))
                return $this->getObj()[$_GET['lang']][$_GET['table']];
            else if(!(isset($_GET['lang']) && isset($_GET['table']))){
                $tableData = array();
                foreach ($this->getModel2()['AllNamesLanguage'] as $key=>$value)
                    $tableData[$key] = $this->getObj()[$key];
                return $tableData;
            }
            else
                return array();
        }, !(isset($_GET['lang']) && isset($_GET['table']))?array('LanguageName', 'LanguageValue'):array('LanguageValue'));
    }
    function getText(){
        return $this->Text;
    }
    function getWordHint(){
        return $this->WordHint;
    }
}
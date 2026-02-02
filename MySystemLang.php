<?php
require 'MyLangStyle.php';
class MySystemlang extends MyLangStyle{
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('SystemLang', $message, $type);
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
}
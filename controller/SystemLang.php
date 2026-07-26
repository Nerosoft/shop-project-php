<?php
// require 'auth/test_session2.php';
include 'interface/InterfaceDataView.php';
class MySystemlang extends ModelJson implements InterfaceDataView{
    function __construct(){
        parent::__construct('SystemLang', function(){
            if(isset($_GET['lang']) && isset($_GET['table']))
                return $this->getObj()[$_GET['lang']][$_GET['table']];
            else{
                $tableData = array();
                foreach ($this->getModel2()['AllNamesLanguage'] as $key=>$value)
                    $tableData[$key] = $this->getObj()[$key];
                return $tableData;
            }
            // else
            //     return array();
        }, !(isset($_GET['lang']) && isset($_GET['table']))?array('LanguageName', 'LanguageValue'):array('LanguageValue'));
    }
    function getView(){
        include 'view/systemlang.php';
    }
    function getSelectAll(){
        return $this->getModelPage()['LanguageSelectAll'];
    }
    function getText(){
        return $this->getModelPage()['Text'];
    }
    function getWordHint(){
        return $this->getModelPage()['WordHint'];
    }
}
new MySystemlang();

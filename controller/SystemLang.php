<?php
// require 'auth/test_session2.php';
class MySystemlang extends ModelJson{
    function __construct(){
        parent::__construct('SystemLang', !(isset($_GET['lang']) && isset($_GET['table']))?array('LanguageName', 'LanguageValue'):array('LanguageValue'));
        $this->initMenuSettingLang();
    }
    function getMyDataView(){
        if(isset($_GET['lang']) && isset($_GET['table']))
            return $this->getObj()[$_GET['lang']][$_GET['table']];
        else{
            $tableData = array();
            foreach ($this->getModel2()['AllNamesLanguage'] as $key=>$value)
                $tableData[$key] = $this->getObj()[$key];
            return $tableData;
        }
    }
    function getView(){
        include 'view/systemlang.php';
        echo '</tbody></table></div>';
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
$view = new MySystemlang();

<?php
require 'ErrorChangelanguageAllNames.php';
trait ErrorChangelanguage{
    use ErrorChangelanguageAllNames;
    private $NewLangNameRequired;
    private $NewLangNameInvalid;
    function initErrorChangelanguage($info, $AllNamesLanguage){
        $this->NewLangNameRequired = $info['NewLangNameRequired'];
        $this->NewLangNameInvalid = $info['NewLangNameInvalid'];
        $this->initErrorChangelanguageAllNames($AllNamesLanguage);
    }
    function getNewLangNameRequired(){
        return $this->NewLangNameRequired;
    }
    function getNewLangNameInvalid(){
        return $this->NewLangNameInvalid;
    }
    function saveNameLanguage($name, $nameKey, $newKey, $myData){
        foreach ($name as $key=>$value)
            $myData[$key][$nameKey][$newKey] = $_POST['lang_name'];
        return $myData;
    }
    function validLanguageInput($modal){
        $this->initErrorChangelanguage($modal->getModelPage(), $modal->getModel2()['AllNamesLanguage']);
        if(!isset($_POST['lang_name']) || $_POST['lang_name'] === '')
            $modal->initViewPost($this->getNewLangNameRequired());
        else if(strlen($_POST['lang_name']) < 3)
            $modal->initViewPost($this->getNewLangNameInvalid());
    }
}

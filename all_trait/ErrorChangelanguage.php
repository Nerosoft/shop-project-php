<?php
trait ErrorChangelanguage{
    private $NewLangNameRequired;
    private $NewLangNameInvalid;
    private $allNames;
    // function initErrorChangelanguage(){
    //     $this->NewLangNameRequired = $this->getModelPage()['NewLangNameRequired'];
    //     $this->NewLangNameInvalid = $this->getModelPage()['NewLangNameInvalid'];
    //     $this->allNames = $this->getModel2()['AllNamesLanguage'];
    // }
    function getallNames(){
        return $this->getModel2()['AllNamesLanguage'];//$this->allNames;
    }
    function getNewLangNameRequired(){
        return $this->getModelPage()['NewLangNameRequired'];//$this->NewLangNameRequired;
    }
    function getNewLangNameInvalid(){
        return $this->getModelPage()['NewLangNameInvalid'];//$this->NewLangNameInvalid;
    }
    function saveNameLanguage($name, $nameKey, $myData){
        foreach ($name as $key=>$value)
            $myData[$key][$nameKey][$this->keyId] = $_POST['lang_name'];
        return $myData;
    }
    function validLanguageInput(){
        //$this->initErrorChangelanguage();
        if(!isset($_POST['lang_name']) || $_POST['lang_name'] === '')
            $this->showError($this->getNewLangNameRequired());
        else if(strlen($_POST['lang_name']) < 3)
            $this->showError($this->getNewLangNameInvalid());
        else if(ModelJson::getFileName() === 'ChangeLanguageCreatePost' && !isset($_POST['selectedLanguage']))
            $this->showError($this->getModelPage()['LanguageReq']);
        else if(ModelJson::getFileName() === 'ChangeLanguageCreatePost' && !isset($this->getallNames()[$_POST['selectedLanguage']]))
            $this->showError($this->getModelPage()['LanguageInv']);
    }
}

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
            ModelJson::initView2($this->getUrlName2(), $this->getNewLangNameRequired());
        else if(strlen($_POST['lang_name']) < 3)
            ModelJson::initView2($this->getUrlName2(), $this->getNewLangNameInvalid());
        else if(ModelJson::getFileName() === 'ChangeLanguageCreatePost' && !isset($_POST['selectedLanguage']))
            ModelJson::initView2($this->getUrlName2(), 'LanguageReq');
        else if(ModelJson::getFileName() === 'ChangeLanguageCreatePost' && !isset($this->getallNames()[$_POST['selectedLanguage']]))
            ModelJson::initView2($this->getUrlName2(), 'LanguageInv');
    }
}

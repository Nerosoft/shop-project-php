<?php
require 'page.php';
require 'ErrorChangelanguage.php';
require 'InfoChangeLangStyle.php';
class MyChangeLanguage extends Page{
    use ErrorChangelanguage, InfoChangeLangStyle;
    private $LabelNameLanguage;
    private $HintNewLangName;
    private $NameLangaue;
    private $DataView;
    function getNameLangaue(){
        return $this->NameLangaue;
    }
    function getHintNewLangName(){
        return $this->HintNewLangName;
    }
    function getLabelNameLanguage(){
        return $this->LabelNameLanguage;
    }
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('ChangeLanguage', $message, $type);
        $this->initErrorChangelanguage($this->getModel2());
        $this->InitInfoChangeLangStyle($this->getModelPage());
        $this->LabelNameLanguage = $this->getModelPage()['LabelCreateLanguage'];
        $this->HintNewLangName = $this->getModelPage()['HintNewLangName'];
        $this->NameLangaue = $this->getModelPage()['NameLangaue'];
        $this->DataView =  array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']));
    }
    function getMyDataView(){
        return $this->DataView;
    }
}
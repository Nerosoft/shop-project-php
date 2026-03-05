<?php
require 'ErrorChangelanguage.php';
require 'ChangeStyleLangBranch.php';
trait InfoChangeLangStyle{
    use ErrorChangelanguage, ChangeStyleLangBranch;
    private $LabelNameLanguage;
    private $HintNewLangName;
    private $NameLangaue;
    private $DataView;
    function InitInfoChangeLangStyle($obj, $DataView, $lang){
        $this->initErrorChangelanguage($obj, $lang);
        $this->initChangeStyleLangBranch($obj);
        $this->LabelNameLanguage = $obj['LabelCreateLanguage'];
        $this->HintNewLangName = $obj['HintNewLangName'];
        $this->NameLangaue = $obj['NameLangaue'];
        $this->DataView = $DataView;
    }
    function getMyDataView(){
        return $this->DataView;
    }
    function getNameLangaue(){
        return $this->NameLangaue;
    }
    function getHintNewLangName(){
        return $this->HintNewLangName;
    }
    function getLabelNameLanguage(){
        return $this->LabelNameLanguage;
    }
}
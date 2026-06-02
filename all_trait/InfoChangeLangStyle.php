<?php
require 'ErrorChangelanguage.php';
require 'ChangeStyleLangBranch.php';
trait InfoChangeLangStyle{
    use ErrorChangelanguage, ChangeStyleLangBranch;
    private $LabelNameLanguage;
    private $HintNewLangName;
    private $NameLangaue;
    private $DataView;
    function InitInfoChangeLangStyle($DataView){
        $this->initErrorChangelanguage();
        $this->LabelNameLanguage = $this->getModelPage()['LabelCreateLanguage'];
        $this->HintNewLangName = $this->getModelPage()['HintNewLangName'];
        $this->NameLangaue = $this->getModelPage()['NameLangaue'];
        $this->DataView = $DataView;
        echo '<div class="start-page container">';
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
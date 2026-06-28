<?php
require 'ErrorChangelanguage.php';
require 'ChangeStyleLangBranch.php';
trait InfoChangeLangStyle{
    use ErrorChangelanguage, ChangeStyleLangBranch;
    private $LabelNameLanguage;
    private $HintNewLangName;
    private $NameLangaue;
    function getHintNewLangName(){
        return $this->getModelPage()['HintNewLangName'];
    }
    function getLabelNameLanguage(){
        return $this->getModelPage()['LabelCreateLanguage'];
    }
}
<?php
require 'ErrorChangelanguage.php';
require 'ChangeStyleLangBranch.php';
trait InfoChangeLangStyle{
    use ErrorChangelanguage, ChangeStyleLangBranch;
    private $LabelNameLanguage;
    private $HintNewLangName;
    private $NameLangaue;
    function InitInfoChangeLangStyle(){
        $this->initErrorChangelanguage();
        $this->LabelNameLanguage = $this->getModelPage()['LabelCreateLanguage'];
        $this->HintNewLangName = $this->getModelPage()['HintNewLangName'];
        $this->NameLangaue = $this->getModelPage()['NameLangaue'];
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
    function printTableNames(){
        echo<<<HTML
            <th>{$this->getNameLangaue()}</th>
        HTML;
    }
}
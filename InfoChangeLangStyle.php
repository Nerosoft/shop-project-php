<?php
trait InfoChangeLangStyle{
    private $LabelChangeLanguageMessage;
    private $TitleChangeLanguageMessage;
    private $ButtonChangeLanguageMessage;
    private $LabelNameLanguage;
    private $HintNewLangName;
    private $NameLangaue;
    private $DataView;
    function InitInfoChangeLangStyle($obj, $DataView){
        $this->LabelChangeLanguageMessage = $obj['LabelChangeLanguageMessage'];
        $this->TitleChangeLanguageMessage = $obj['TitleChangeLanguageMessage'];
        $this->ButtonChangeLanguageMessage = $obj['ButtonChangeLanguageMessage'];
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
    function getLabelChangeLanguageMessage(){
        return $this->LabelChangeLanguageMessage;
    }
    function getTitleChangeLanguageMessage(){
        return $this->TitleChangeLanguageMessage;
    }
    function getButtonChangeLanguageMessage(){
        return $this->ButtonChangeLanguageMessage;
    }
}
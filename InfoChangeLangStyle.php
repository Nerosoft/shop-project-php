<?php
trait InfoChangeLangStyle{
    private $LabelChangeLanguageMessage;
    private $TitleChangeLanguageMessage;
    private $ButtonChangeLanguageMessage;
    function InitInfoChangeLangStyle($obj){
        $this->LabelChangeLanguageMessage = $obj['LabelChangeLanguageMessage'];
        $this->TitleChangeLanguageMessage = $obj['TitleChangeLanguageMessage'];
        $this->ButtonChangeLanguageMessage = $obj['ButtonChangeLanguageMessage'];
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
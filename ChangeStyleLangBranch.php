<?php
trait ChangeStyleLangBranch{
    private $TitleChangeLanguageMessage;
    private $ButtonChangeLanguageMessage;
    private $LabelChangeLanguageMessage;
    function initChangeStyleLangBranch($info){
        $this->TitleChangeLanguageMessage = $info['TitleChangeLanguageMessage'];
        $this->ButtonChangeLanguageMessage = $info['ButtonChangeLanguageMessage'];
        $this->LabelChangeLanguageMessage = $info['LabelChangeLanguageMessage'];
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
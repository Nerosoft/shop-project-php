<?php
trait ChangeStyleLangBranch{
    private $TitleChangeLanguageMessage;
    private $ButtonChangeLanguageMessage;
    private $LabelChangeLanguageMessage;
    // function initChangeStyleLangBranch(){
    //     $this->TitleChangeLanguageMessage = $this->getModelPage()['TitleChangeLanguageMessage'];
    //     $this->ButtonChangeLanguageMessage = $this->getModelPage()['ButtonChangeLanguageMessage'];
    //     $this->LabelChangeLanguageMessage = $this->getModelPage()['LabelChangeLanguageMessage'];
    // }
    function getLabelChangeLanguageMessage(){
        return $this->getModelPage()['LabelChangeLanguageMessage'];
    }
    function getTitleChangeLanguageMessage(){
        return $this->getModelPage()['TitleChangeLanguageMessage'];
    }
    function getButtonChangeLanguageMessage(){
        return $this->getModelPage()['ButtonChangeLanguageMessage'];
    }
}
<?php
trait ChangeStyleLangBranch{
    private $TitleChangeLanguageMessage;
    private $ButtonChangeLanguageMessage;
    private $LabelChangeLanguageMessage;
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
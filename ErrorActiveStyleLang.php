<?php
trait ErrorActiveStyleLang{
    private $ChangeLang;
    private $ChangeStyle;
    function initErrorActiveStyleLang(){
        $this->ChangeLang = $this->getModelPage()['UsedLanguage'];
        $this->ChangeStyle = $this->getModelPage()['UsedStyle'];
    }
    function getChangeLang(){
        return $this->ChangeLang;
    }
    function getChangeStyle(){
        return $this->ChangeStyle;
    }
}
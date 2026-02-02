<?php
require 'page.php';
require 'InfoChangeLangStyle.php';
class MyChangeLanguage extends Page{
    use InfoChangeLangStyle;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('ChangeLanguage', $message, $type);
        $this->InitInfoChangeLangStyle($this->getModelPage(), array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage'])), $this->getModel2()['AllNamesLanguage']);
    }
}
<?php
require 'page.php';
require 'ErrorChangelanguage.php';
require 'InfoChangeLangStyle.php';
class MyChangeLanguage extends Page{
    use ErrorChangelanguage, InfoChangeLangStyle;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('ChangeLanguage', $message, $type);
        $this->initErrorChangelanguage($this->getModelPage(), $this->getModel2()['AllNamesLanguage']);
        $this->InitInfoChangeLangStyle($this->getModelPage(), array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage'])));
    }
}
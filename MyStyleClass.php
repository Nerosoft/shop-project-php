<?php
require 'MyLangStyle.php';
require 'InfoChangeLangStyle.php';
class MyStyleClass extends MyLangStyle{
   use InfoChangeLangStyle;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('MyStyle', $message, $type);
        $this->InitInfoChangeLangStyle($this->getModelPage());
        $this->DataView = MyLanguage::fromArray($this->getModel2()['Style']);
    }
}
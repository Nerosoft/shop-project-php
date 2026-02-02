<?php
require 'AdminMenu.php';
require 'InfoChangeLangStyle.php';
class MyStyleClass extends AdminMenu{
   use InfoChangeLangStyle;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('MyStyle', $message, $type);
        $this->InitInfoChangeLangStyle($this->getModelPage(), MyLanguage::fromArray($this->getModel2()['Style']), $this->getModel2()['AllNamesLanguage']);
    }
}
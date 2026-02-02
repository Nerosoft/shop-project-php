<?php
require 'AdminMenu.php';
require 'ErrorChangelanguage.php';
require 'InfoChangeLangStyle.php';
class MyStyleClass extends AdminMenu{
   use ErrorChangelanguage, InfoChangeLangStyle;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('MyStyle', $message, $type);
        $this->initErrorChangelanguage($this->getModelPage(), $this->getModel2()['AllNamesLanguage']);
        $this->InitInfoChangeLangStyle($this->getModelPage(), MyLanguage::fromArray($this->getModel2()['Style']));
    }
}
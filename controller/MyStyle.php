<?php
require 'AdminMenu.php';
require 'all_trait/InfoChangeLangStyle.php';
class MyStyleClass extends AdminMenu{
   use InfoChangeLangStyle;
    function __construct($message, $type){
        parent::__construct('MyStyle', $message, $type, function(){
            return array_reverse(MyLanguage::fromArray($this->getModel2()['Style']));
        }, MyLanguage::getKeysObject());
    }
}
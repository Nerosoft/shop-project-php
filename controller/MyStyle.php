<?php
require 'all_trait/InfoChangeLangStyle.php';
class MyStyleClass extends AdminMenu{
   use InfoChangeLangStyle;
    function __construct(){
        parent::__construct('MyStyle', function(){
            return array_reverse(MyLanguage::fromArray($this->getModel2()['Style']));
        }, MyLanguage::getKeysObject());
    }
}
$view = new MyStyleClass();
$myStateStyleLang = 'Style';
include 'pis_of_page/style_lang_view.php';
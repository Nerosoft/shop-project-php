<?php
// require 'auth/test_session2.php';
class MyStyleClass extends ModelJson{
    function __construct(){
        parent::__construct('MyStyle', function(){
            return array_reverse(MyLanguage::fromArray($this->getModel2()['Style']));
        }, MyLanguage::getKeysObject());
    }
    function getView(){
        $myStateStyleLang = 'Style';
        include 'pis_of_page/style_lang_view.php';
    }
}
new MyStyleClass();

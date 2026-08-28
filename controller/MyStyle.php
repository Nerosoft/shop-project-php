<?php
// require 'auth/test_session2.php';
class MyStyleClass extends ModelJson{
    function __construct(){
        parent::__construct('MyStyle', MyLanguage::getKeysObject());
    }
    function getView(){
        $myStateStyleLang = 'Style';
        $valueDataView = $this->getStyle();
        include 'pis_of_page/style_lang_view.php';
    }
}
$view = new MyStyleClass();

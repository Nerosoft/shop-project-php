<?php
// require 'auth/test_session2.php';
class MyChangeLanguage extends ModelJson{
    function __construct(){
        parent::__construct('ChangeLanguage', MyLanguage::getKeysObject());
        $this->initMenuSettingLang();
    }
    function getView(){
        $myStateStyleLang ='AllNamesLanguage';
        include 'pis_of_page/style_lang_view.php';
    }
    function makeCreateModal($title, $button){
        $action = 'ChangeLanguageCreatePost.php';
        include('all_modal/modal_change_language.php');
        include "pis_of_page/input_language.php";
        include('all_modal/end_model.php');
    }
}
$view = new MyChangeLanguage();
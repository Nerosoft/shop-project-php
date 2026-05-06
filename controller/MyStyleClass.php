<?php
require 'AdminMenu.php';
require 'all_trait/InfoChangeLangStyle.php';
class MyStyleClass extends AdminMenu{
   use InfoChangeLangStyle;
    function __construct($message, $type){
        parent::__construct('MyStyle', $message, $type);
        echo '<div class="start-page container">';
    }
    static function initMyStyleClass($message = 'LoadMessage', $type = 'success'){
        $view = new MyStyleClass($message, $type);
        include 'views/ChangeLanguage_view.php';
        exit;
    }
}
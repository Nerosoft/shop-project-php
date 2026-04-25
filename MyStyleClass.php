<?php
require 'AdminMenu.php';
require 'InfoChangeLangStyle.php';
class MyStyleClass extends AdminMenu{
   use InfoChangeLangStyle;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('MyStyle', $message, $type);
        echo '<div class="start-page container">';
    }
    static function initMyStyleClass($message = 'LoadMessage', $type = 'success'){
        $view = new MyStyleClass($message, $type);
        include 'ChangeLanguage_view.php';
        exit;
    }
}
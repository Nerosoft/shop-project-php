<?php
require 'AdminMenu.php';
require 'InfoChangeLangStyle.php';
class MyStyleClass extends AdminMenu{
   use InfoChangeLangStyle;
    private $AllBranches;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('MyStyle', $message, $type);
        $this->AllBranches = $this->getModelPage()['AllBranches'];
        echo '<div class="start-page container">';
    }
    function getAllBranches(){
        return $this->AllBranches;
    }
    static function initMyStyleClass($message = 'LoadMessage', $type = 'success'){
        $view = new MyStyleClass($message, $type);
        include 'ChangeLanguage_view.php';
        exit;
    }
}
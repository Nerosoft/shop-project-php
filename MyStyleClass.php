<?php
require 'AdminMenu.php';
require 'InfoChangeLangStyle.php';
class MyStyleClass extends AdminMenu{
   use InfoChangeLangStyle;
    private $AllBranches;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('MyStyle', $message, $type);
        $this->InitInfoChangeLangStyle($this->getModelPage(), MyLanguage::fromArray($this->getModel2()['Style']), $this->getModel2()['AllNamesLanguage']);
        $this->AllBranches = $this->getModelPage()['AllBranches'];
    }
    function getAllBranches(){
        return $this->AllBranches;
    }
    static function initMyStyleClass($message = 'LoadMessage', $type = 'success'){
        $view = new MyStyleClass($message, $type);
        include 'MyStyle_view.php';
        exit;
    }
}
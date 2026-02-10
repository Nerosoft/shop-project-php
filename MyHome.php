<?php
require 'page.php';
require 'CustomTable.php';
require 'ErrorsHome.php';
require 'InfoHome.php';
class MyHome extends Page{
    use InfoHome, ErrorsHome;
    private $TableName;
    private $LabelInputNumber;
    private $HintInputNumber;
    private $DataView;
    function __construct($message, $type){
        parent::__construct('Home', $message, $type);
        $this->initErrorsHome($this->getModelPage());
        $this->initInfoHome($this->getModelPage());
        $this->TableName = $this->getModelPage()['NameTable'];
        $this->LabelInputNumber = $this->getModelPage()['LabelInputNumber'];
        $this->HintInputNumber = $this->getModelPage()['HintInputNumber'];
        $this->DataView = isset($this->getModel2()['MyFlexTables'])?array_reverse(CustomTable::fromArray($this)):array();
    }
    function getMyDataView(){
        return $this->DataView;
    }
    function getTableName(){
        return $this->TableName;
    }
    function getLabelInputNumber(){
        return $this->LabelInputNumber;
    }
    function getHintInputNumber(){
        return $this->HintInputNumber;
    }
    static function initHome($message = 'LoadMessage', $type = 'success'){
        $view = new MyHome($message, $type);
        include 'home_view.php';
        exit;
    }
}
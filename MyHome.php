<?php
require 'page.php';
require 'CustomTable.php';
require 'ErrorsHome.php';
class MyHome extends Page{
    use ErrorsHome;
    private $TableName;
    private $LabelName;
    private $HintName;
    private $LabelInputNumber;
    private $HintInputNumber;
    private $DataView;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Home', $message, $type);
        $this->initErrorsHome($this->getModelPage());
        $this->TableName = $this->getModelPage()['NameTable'];
        $this->LabelName = $this->getModelPage()['LabelName'];
        $this->HintName = $this->getModelPage()['HintName'];
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
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
    function getLabelInputNumber(){
        return $this->LabelInputNumber;
    }
    function getHintInputNumber(){
        return $this->HintInputNumber;
    }
}
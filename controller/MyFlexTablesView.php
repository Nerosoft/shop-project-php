<?php
require 'page.php';
require 'all_trait/ErrorFlexTable.php';
if(!isset((new ModelJson($_GET['id']))->getObj()[(new ModelJson($_GET['id']))->getObj()['Setting']['Language']][$_GET['id']]))
    header("Location:index");
include 'interface/InterfaceDataView.php';
class MyFlexTablesView extends Page implements InterfaceDataView{
    use ErrorFlexTable;
    private $TableHead;
    private $Label;
    private $Hint;
    private $DataView;
    function __construct($message, $type){
        parent::__construct($_GET['id'], $message, $type);
        $this->initErrorFlexTable($this->getModelPage());
        $this->initImageInfo();
        $this->TableHead = $this->getModelPage()['TableHead'];
        $this->Label = $this->getModelPage()['Label'];
        $this->Hint = $this->getModelPage()['Hint'];
        $this->DataView = isset($this->getObj()[$_GET['id']])?array_reverse($this->getObj()[$_GET['id']]):array();
    }
    static function initMyFlexTablesView($message = 'LoadMessage', $type = 'success'){
        $view = new MyFlexTablesView($message, $type);
        include 'views/FlexTables_view.php';
        exit;
    }
    function getMyDataView(){
        return $this->DataView;
    }
    function getTableHead(){
        return $this->TableHead;
    }
    function getLabel(){
        return $this->Label;
    }
    function getHint(){
        return $this->Hint;
    }
}
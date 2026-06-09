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
    function __construct($message, $type){
        parent::__construct($_GET['id'], $message, $type, function(){
            return isset($this->getObj()[$_GET['id']])?array_reverse($this->getObj()[$_GET['id']]):array();
        });
        $this->initErrorFlexTable();
        $this->initImageInfo();
        // $this->TableHead = $this->getModelPage()['TableHead'];
        $this->Label = $this->getModelPage()['Label'];
        $this->Hint = $this->getModelPage()['Hint'];
    }
    function getTableHead(){
        return $this->getModelPage()['TableHead'];//$this->TableHead;
    }
    function getLabel(){
        return $this->Label;
    }
    function getHint(){
        return $this->Hint;
    }
    function printTableNames(){
        echo'<th>'.$this->getTableProductImage().'</th>';
        foreach($this->getTableHead() as $index=>$name)
            echo<<<HTML
                <th>{$name}</th>
            HTML;
    }
    function makeCreateModal($view, $title, $button){
        $action = 'FlexTablesCreatePost?id='.$_GET['id'];
        include('all_modal/modal_flex.php');
    }
}
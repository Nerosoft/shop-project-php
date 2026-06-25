<?php
require 'AdminMenu.php';
require 'all_trait/ErrorFlexTable.php';
if(!isset((new ModelJson($_GET['id']??$_POST['option']))->getObj()[(new ModelJson($_GET['id']??$_POST['option']))->getObj()['Setting']['AllNamesLanguage']][$_GET['id']??$_POST['option']]))
    header("Location:index");
include 'interface/InterfaceDataView.php';
class MyFlexTablesView extends AdminMenu implements InterfaceDataView{
    use ErrorFlexTable;
    private $TableHead;
    private $Label;
    private $Hint;
    function __construct($message, $type){
        parent::__construct($_GET['id']??$_POST['option'], $message, $type, function(){
            $this->initErrorFlexTable();
            $this->initImageInfo();
            $this->TableHead = $this->getModelPage()['TableHead'];
            $this->Label = $this->getModelPage()['Label'];
            $this->Hint = $this->getModelPage()['Hint'];
            return isset($this->getObj()[$this->getUrlName2()])?array_reverse($this->getObj()[$this->getUrlName2()]):array();
        }, null);
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
    function printTableNames(){
        echo'<th>'.$this->getTableProductImage().'</th>';
        foreach($this->getTableHead() as $index=>$name)
            echo<<<HTML
                <th>{$name}</th>
            HTML;
    }
    function makeCreateModal($view, $title, $button, $idModel = 'createModel', $index = null, $myObject = null){
        $action = 'FlexTablesCreatePost?id='.$this->getUrlName2();
        include('all_modal/modal_flex.php');
    }
}
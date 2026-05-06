<?php
require 'page.php';
require 'all_trait/ErrorProduct.php';
require 'class_object/ProductValue.php';
include 'interface/InterfaceDataView.php';
class Product extends Page implements InterfaceDataView{
    use ErrorProduct;
    private $NameHeadTable;
    private $LabelName;
    private $HintName;
    private $DescreptionHeadTable;
    private $LabelDescreption;
    private $HintDescreption;
    private $SalaryHeadTable;
    private $LabelSalary;
    private $HintSalary;
    private $CategoryHeadTable;
    private $LabelCategory;
    private $HintCategory;
    private $DataView = array();
    function __construct($message, $type){
        parent::__construct('Product', $message, $type);
        $this->initErrorProduct($this->getModelPage());
        $this->NameHeadTable = $this->getModelPage()['NameHeadTable'];
        $this->LabelName = $this->getModelPage()['LabelName'];
        $this->HintName = $this->getModelPage()['HintName'];
        $this->DescreptionHeadTable = $this->getModelPage()['DescreptionHeadTable'];
        $this->LabelDescreption = $this->getModelPage()['LabelDescreption'];
        $this->HintDescreption = $this->getModelPage()['HintDescreption'];
        $this->SalaryHeadTable = $this->getModelPage()['SalaryHeadTable'];
        $this->LabelSalary = $this->getModelPage()['LabelSalary'];
        $this->HintSalary = $this->getModelPage()['HintSalary'];
        $this->CategoryHeadTable = $this->getModelPage()['CategoryHeadTable'];
        $this->LabelCategory = $this->getModelPage()['LabelCategory'];
        $this->HintCategory = $this->getModelPage()['HintCategory'];
        $this->DataView = isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
    }
    function getNameHeadTable(){
        return $this->NameHeadTable;
    }
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
    function getDescreptionHeadTable(){
        return $this->DescreptionHeadTable;
    }
    function getLabelDescreption(){
        return $this->LabelDescreption;
    }
    function getHintDescreption(){
        return $this->HintDescreption;
    }
    function getSalaryHeadTable(){
        return $this->SalaryHeadTable;
    }
    function getLabelSalary(){
        return $this->LabelSalary;
    }
    function getHintSalary(){
        return $this->HintSalary;
    }
    function getCategoryHeadTable(){
        return $this->CategoryHeadTable;
    }
    function getLabelCategory(){
        return $this->LabelCategory;
    }
    function getHintCategory(){
        return $this->HintCategory;
    }
    function getMyDataView(){
        return $this->DataView;
    }
    static function initProduct($message = 'LoadMessage', $type = 'success'){
        $view = new Product($message, $type);
        include 'views/ProductView.php';
        exit;
    }
}
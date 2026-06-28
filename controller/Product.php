<?php
require 'AdminMenu.php';
require 'all_trait/ErrorProduct.php';
require 'class_object/ProductValue.php';
include 'interface/InterfaceDataView.php';
class Product extends AdminMenu implements InterfaceDataView{
    use ErrorProduct;
    private $LabelName;
    private $HintName;
    private $LabelDescreption;
    private $HintDescreption;
    private $LabelSalary;
    private $HintSalary;
    private $LabelCategory;
    private $HintCategory;
    function __construct($message, $type){
        parent::__construct('Product', $message, $type, function(){
            $this->initErrorProduct();
            $this->LabelName = $this->getModelPage()['LabelName'];
            $this->HintName = $this->getModelPage()['HintName'];
            $this->LabelDescreption = $this->getModelPage()['LabelDescreption'];
            $this->HintDescreption = $this->getModelPage()['HintDescreption'];
            $this->LabelSalary = $this->getModelPage()['LabelSalary'];
            $this->HintSalary = $this->getModelPage()['HintSalary'];
            $this->LabelCategory = $this->getModelPage()['LabelCategory'];
            $this->HintCategory = $this->getModelPage()['HintCategory'];
            return isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
        },ProductValue::getKeysObject());
    }
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
    function getLabelDescreption(){
        return $this->LabelDescreption;
    }
    function getHintDescreption(){
        return $this->HintDescreption;
    }
    function getLabelSalary(){
        return $this->LabelSalary;
    }
    function getHintSalary(){
        return $this->HintSalary;
    }
    function getLabelCategory(){
        return $this->LabelCategory;
    }
    function getHintCategory(){
        return $this->HintCategory;
    }
    function makeCreateModal($view, $title, $button, $idModel = 'createModel', $index = null, $myObject = null){
        $action = 'ProductCreatePost.php';
        include('all_modal/ProductModal.php');
    }
}
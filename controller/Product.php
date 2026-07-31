<?php
// require 'auth/test_session2.php';
require 'class_object/ProductValue.php';
class Product extends ModelJson{
    function __construct(){
        parent::__construct('Product', ProductValue::getKeysObject());
    }
    function getMyDataView(){
        return isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
    }
    function getView(){
        include 'view/product.php';
    }
    function getLabelName(){
        return $this->getModelPage()['LabelName'];
    }
    function getHintName(){
        return $this->getModelPage()['HintName'];
    }
    function getLabelDescreption(){
        return $this->getModelPage()['LabelDescreption'];
    }
    function getHintDescreption(){
        return $this->getModelPage()['HintDescreption'];
    }
    function getLabelSalary(){
        return $this->getModelPage()['LabelSalary'];
    }
    function getHintSalary(){
        return $this->getModelPage()['HintSalary'];
    }
    function getLabelCategory(){
        return $this->getModelPage()['LabelCategory'];
    }
    function getHintCategory(){
        return $this->getModelPage()['HintCategory'];
    }
    function makeCreateModal($title, $button, $idModel = 'createModel', $index = null, $myObject = null){
        $action = 'ProductCreatePost.php';
        include('all_modal/ProductModal.php');
    }
}
$view = new Product();
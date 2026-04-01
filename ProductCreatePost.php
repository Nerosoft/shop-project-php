<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
require 'ValidationId.php';
class ProductCreatePost extends ValidationId{
    use ErrorProduct;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Product');
        $this->validProductInput($this->getMyModal());
        if(isset($_POST['Branches']) || isset($_POST['choices']))
            parent::__construct($this->getMyModal(), isset($_POST['id'])?$_POST['id']:$this->getMyModal()->getRandomId());
        //for edit user
        else if(isset($_POST['id'])){
            parent::__construct($this->getMyModal(), $_POST['id']);
            $this->getMyModal()->saveModel($this->saveProduct($this->getMyModal()->getObj(), $_POST['id'], $this->getMyModal()->getId()));
        }else//for create user
            $this->getMyModal()->saveModel($this->saveProduct($this->getMyModal()->getObj(), $this->getMyModal()->getRandomId(), $this->getMyModal()->getId()));
        Product::initProduct(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new ProductCreatePost();
}else
    header('LOCATION:view?id=Product');
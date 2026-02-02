<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
require 'MessageError.php';
class ProductCreatePost extends MessageError{
    use ErrorProduct;
    function __construct(){
        parent::__construct('Product');
        $this->initErrorProduct($this->getModelPage());
        $this->validProduct($this);
        if($this->isEmptyErrors()){
            $this->saveProduct($this->getRandomId());
            $view = new Product('MessageModelCreate');
        }else{
            $view = new Product();
            $this->displayErrors();
        }
        include 'ProductView.php';
    }
}

new ProductCreatePost();
}else
    header('LOCATION:Product.php');
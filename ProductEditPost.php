<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
require 'ValidationId.php';
class ProductEditPost extends ValidationId{
    use ErrorProduct;
    function __construct(){
        parent::__construct('Product');
        $this->initErrorProduct($this->getModelPage());
        $this->validProduct($this);
        if($this->isEmptyErrors()){
            $this->saveProduct($_POST['id']);
            $view = new Product('MessageModelEdit');
        }else{
            $view = new Product();
            $this->displayErrors();
        }
        include 'ProductView.php';
    }
}

new ProductEditPost();
}else
    header('LOCATION:Product.php');
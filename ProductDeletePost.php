<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
require 'ValidationId.php';
class ProductDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Product');
        if($this->isEmptyErrors()){
            $this->deleteItem('Product');
            array_map('unlink', glob('asset/product/'.$_POST['id'].'.*'));
            $view = new Product('Delete');
        }else{
            $view = new Product();
            $this->displayErrors();
        }
        include 'ProductView.php';
    }
}

new ProductDeletePost();
}else
    header('LOCATION:Product.php');
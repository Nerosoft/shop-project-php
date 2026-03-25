<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
require 'ValidationId.php';
class ProductDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Product');
        $this->saveModel($this->deleteItem('Product', $this->getObj()));
        array_map('unlink', glob('asset/product/'.$this->getId().'/'.$_POST['id'].'.*'));
        Product::initProduct('Delete');
    }
}

new ProductDeletePost();
}else
    header('LOCATION:view?id=Product');
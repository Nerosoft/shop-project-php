<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
require 'ValidationId.php';
class ProductEditPost extends ValidationId{
    use ErrorProduct;
    function __construct(){
        parent::__construct('Product');
        $this->initErrorProduct2($this->getMyModal(), $_POST['id'], 'MessageModelEdit');
    }
}

new ProductEditPost();
}else
    header('LOCATION:view?id=Product');
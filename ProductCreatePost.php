<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
require 'ValidationId.php';
class ProductCreatePost extends ValidationId{
    use ErrorProduct;
    function __construct(){
        parent::__construct('Product');
        $this->initErrorProduct2($this->getMyModal(), $this->getRandomId());
    }
}

new ProductCreatePost();
}else
    header('LOCATION:view?id=Product');
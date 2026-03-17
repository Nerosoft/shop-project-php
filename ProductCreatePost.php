<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
class ProductCreatePost extends ModelJson{
    use ErrorProduct;
    function __construct(){
        parent::__construct('Product');
        $this->initErrorProduct2($this->getMyModal(), $this->getRandomId());
    }
}

new ProductCreatePost();
}else
    header('LOCATION:view?id=Product');
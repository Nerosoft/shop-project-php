<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
class ProductCreatePost extends ModelJson{
    use ErrorProduct;
    function __construct(){
        parent::__construct('Product');
        $keyProduct = $this->getRandomId();
        if(isset($_POST['Branches']) && count($this->getFileByFixedId()['Branches']) > 1 || isset($_POST['choices']) && count($this->getFileByFixedId()['Branches']) > 1 && $this->validBranchKeys()){
            $file = $this->getFile();
            $this->validProductInput($this->getMyModal());
            foreach (isset($_POST['Branches']) ? $this->getFileByFixedId()['Branches'] : $_POST['choices'] as $keyBranch => $value)
                $file[$keyBranch] = $this->saveProduct($file[$keyBranch], $keyProduct, $keyBranch);
            $this->saveFile($file);
            Product::initProduct('MessageModelCreate');
        }else 
            $this->initErrorProduct2($this->getMyModal(), $keyProduct);
    }
}

new ProductCreatePost();
}else
    header('LOCATION:view?id=Product');
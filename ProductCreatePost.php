<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'controller/ProductClass.php';
require 'ValidationId.php';
class ProductCreatePost extends ValidationId{
    use ErrorProduct;
    private $keyId;
    function __construct(){
        $this->keyId = isset($_POST['id'])?$_POST['id']:$this->getRandomId();
        parent::__construct('Product',  function($myFile, $keyBranch){
            return $this->saveProduct($myFile, $keyBranch);
        });
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->saveModel($this->saveProduct($this->getObj(), $this->getId()));
        Product::initProduct(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function saveProduct($myData, $idSseion){
        $myData['Product'][$this->keyId] = array("Name"=>$_POST["name"], "Descreption"=>$_POST["descreption"], "Salary"=>$_POST["salary"], "Category"=>$_POST["category"]);
        $this->saveProductTable($idSseion);
        return $myData;
    }
}

new ProductCreatePost();
}else
    header('LOCATION:view?id=Product');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
require 'ValidationId.php';
class ProductCreatePost extends ValidationId{
    use ErrorProduct;
    private $modal;
    private $keyId;
    function __construct(){
        $this->modal = new ModelJson('Product');
        $this->validProductInput($this->getMyModal());
        $this->keyId = isset($_POST['id'])?$_POST['id']:$this->getMyModal()->getRandomId();
        if(isset($_POST['Branches']) || isset($_POST['choices'])){
            parent::__construct($this->getMyModal(),  function($myFile, $keyBranch){
                return $this->saveProduct($myFile, $keyBranch);
            });
        }
        //for edit product
        else if(isset($_POST['id'])){
            parent::__construct($this->getMyModal());
            $this->getMyModal()->saveModel($this->saveProduct($this->getMyModal()->getObj(), $this->getMyModal()->getId()));
        }else//for create product
            $this->getMyModal()->saveModel($this->saveProduct($this->getMyModal()->getObj(), $this->getMyModal()->getId()));
        Product::initProduct(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
    }
    function saveProduct($myData, $idSseion){
        $myData['Product'][$this->keyId] = array("Name"=>$_POST["name"], "Descreption"=>$_POST["descreption"], "Salary"=>$_POST["salary"], "Category"=>$_POST["category"]);
        if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']) && is_dir('asset/product/'.$idSseion))
            copy($_FILES['avatar']['tmp_name'], 'asset/product/'.$idSseion.'/'.$this->keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        else if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']) && is_dir('asset/product')){
            mkdir('asset/product/'.$idSseion);
            copy($_FILES['avatar']['tmp_name'], 'asset/product/'.$idSseion.'/'.$this->keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        }
        else if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])){
            mkdir('asset/product');
            mkdir('asset/product/'.$idSseion);
            copy($_FILES['avatar']['tmp_name'], 'asset/product/'.$idSseion.'/'.$this->keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        }
        return $myData;
    }
}

new ProductCreatePost();
}else
    header('LOCATION:view?id=Product');
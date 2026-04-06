<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'ProductClass.php';
require 'ValidationId.php';
class ProductDeletePost extends ValidationId{
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Product');
        parent::__construct($this->getMyModal(), function($myFile, $key){
            //delete image for product
            array_map('unlink', glob('asset/product/'.$key.'/'.$_POST['id'].'.*'));
            //delete item or array
            return $this->deleteItem('Product', $myFile);
        });
        if(!isset($_POST['Branches']) && !isset($_POST['choices'])){
            $this->getMyModal()->saveModel($this->deleteItem('Product', $this->getMyModal()->getObj()));
            array_map('unlink', glob('asset/product/'.$this->getMyModal()->getId().'/'.$_POST['id'].'.*'));
        }
        Product::initProduct('Delete');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new ProductDeletePost();
}else
    header('LOCATION:view?id=Product');
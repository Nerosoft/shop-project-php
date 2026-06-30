<?php
include 'auth/SessionPost.php';
class ProductCreatePost extends ValidationId{
    use ErrorProduct;
    function __construct(){
        parent::__construct('Product',  function($myFile, $keyBranch){
            return $this->saveProduct($myFile, $keyBranch);
        }, isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
        $this->validProductInput();
        $this->saveModel($this->saveProduct($this->getObj(), $this->getId()));
        $this->showMessage($this->getModelPage()[isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate']);
    }
    function saveProduct($myData, $idSseion){
        $myData['Product'][$this->keyId] = array("Name"=>$_POST["name"], "Descreption"=>$_POST["descreption"], "Salary"=>$_POST["salary"], "Category"=>$_POST["category"]);
        $this->saveProductTable($idSseion);
        return $myData;
    }
}
new ProductCreatePost();
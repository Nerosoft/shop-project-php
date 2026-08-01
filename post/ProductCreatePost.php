<?php
// require 'auth/test_session4.php';
class ProductCreatePost extends ModelJson{
    function __construct(){
        parent::__construct('Product', isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getView(){
        $this->validProductInput();
        $this->saveModel($this->saveProduct($this->getObj(), $this->getId()));
        $this->showMessage($this->getModelPage()[isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate']);
    }
}
$view = new ProductCreatePost();
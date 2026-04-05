<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesCreatePost extends ValidationId{
    use ErrorFlexTable;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson($_GET['id']);
        $this->initErrorFlexTable2($this->getMyModal());
        if(isset($_POST['Branches']) || isset($_POST['choices']))
            parent::__construct($this->getMyModal(), isset($_POST['id'])?$_POST['id']:$this->getMyModal()->getRandomId());
        //for edit user
        else if(isset($_POST['id'])){
            parent::__construct($this->getMyModal(), $_POST['id']);
            $this->getMyModal()->saveModel($this->saveFlexTable($this->getMyModal()->getObj(), $this->getErrorsMessageReq(), $_POST['id']));
        }else//for create user
            $this->getMyModal()->saveModel($this->saveFlexTable($this->getMyModal()->getObj(), $this->getErrorsMessageReq(), $this->getMyModal()->getRandomId()));
        MyFlexTablesView::initMyFlexTablesView(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
    }
}
new FlexTablesCreatePost();
}else
    header('LOCATION:index');
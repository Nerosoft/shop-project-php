<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesEditPost extends ValidationId{
    use ErrorFlexTable;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson($_GET['id']);
        parent::__construct($this->getMyModal()); 
        $this->initErrorFlexTable2($this->getMyModal(), $_POST['id']);
        MyFlexTablesView::initMyFlexTablesView('MessageModelEdit');
    }
    function getMyModal(){
        return $this->modal;
    }
}
new FlexTablesEditPost();
}else
    header('LOCATION:index');
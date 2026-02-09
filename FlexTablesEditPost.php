<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesEditPost extends ValidationId{
    use ErrorFlexTable;
    function __construct(){
        parent::__construct($_GET['id']);
        $this->initErrorFlexTable2($this->getMyModal(), $_POST['id']);
        MyFlexTablesView::initMyFlexTablesView('MessageModelEdit');
    }
}
new FlexTablesEditPost();
}else
    header('LOCATION:index');
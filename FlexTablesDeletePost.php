<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesDeletePost extends ValidationId{
    function __construct(){
        parent::__construct($_GET['id']);
        $this->saveModel($this->deleteItem($_GET['id'], $this->getObj()));
        MyFlexTablesView::initMyFlexTablesView('Delete');
    }
}
new FlexTablesDeletePost();
}else
    header('LOCATION:index');
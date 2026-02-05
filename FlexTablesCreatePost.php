<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
class FlexTablesCreatePost extends ModelJson{
    use ErrorFlexTable;
    function __construct(){
        parent::__construct($_GET['id']);
        $this->initErrorFlexTable2($this->getMyModal(), $this->getRandomId());
        MyFlexTablesView::initMyFlexTablesView('MessageModelCreate');
    }
}
new FlexTablesCreatePost();
}else
    header('LOCATION:Home');
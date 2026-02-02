<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesDeletePost extends ValidationId{
    function __construct(){
        parent::__construct($_GET['id']);
        if($this->isEmptyErrors()){
            $this->deleteItem($_GET['id']);
            $view = new MyFlexTablesView('Delete');
        }else{
            $view = new MyFlexTablesView();
            $this->displayErrors();
        }
        include 'FlexTables_view.php';
    }
}
new FlexTablesDeletePost();
}else
    header('LOCATION:Home');
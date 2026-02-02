<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesEditPost extends ValidationId{
    use ErrorFlexTable;
    function __construct(){
        parent::__construct($_GET['id']);
        $this->initErrorFlexTable($this->getModelPage());
        $this->validFlexTable($this);
        if($this->isEmptyErrors()){
            $this->saveFlexDataBase($_POST['id']);
            $view = new MyFlexTablesView('MessageModelEdit');
        }else{
            $view = new MyFlexTablesView();
            $this->displayErrors();
        }
        include 'FlexTables_view.php';
    }
}
new FlexTablesEditPost();
}else
    header('LOCATION:Home');
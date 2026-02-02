<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'MessageError.php';
class FlexTablesCreatePost extends MessageError{
    use ErrorFlexTable;
    function __construct(){
        parent::__construct($_GET['id']);
        $this->initErrorFlexTable($this->getModelPage());
        $this->validFlexTable($this);
        if($this->isEmptyErrors()){
            $this->saveFlexDataBase($this->getRandomId());
            $view = new MyFlexTablesView('MessageModelCreate');
        }else{
            $view = new MyFlexTablesView();
            $this->displayErrors();
        }
        include 'FlexTables_view.php';
    }
}
new FlexTablesCreatePost();
}else
    header('LOCATION:Home');
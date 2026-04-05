<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesDeletePost extends ValidationId{
    private $modal;
    function __construct(){
        $this->modal = new ModelJson($_GET['id']);
        parent::__construct($this->getMyModal());
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->deleteItem($_GET['id'], $this->getMyModal()->getObj()));
        MyFlexTablesView::initMyFlexTablesView('Delete');
    }
    function getMyModal(){
        return $this->modal;
    }
}
new FlexTablesDeletePost();
}else
    header('LOCATION:index');
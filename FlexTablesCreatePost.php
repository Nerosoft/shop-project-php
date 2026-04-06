<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesCreatePost extends ValidationId{
    use ErrorFlexTable;
    private $modal;
    private $keyId;
    function __construct(){
        $this->modal = new ModelJson($_GET['id']);
        $this->initErrorFlexTable2($this->getMyModal());
        $this->keyId = isset($_POST['id'])?$_POST['id']:$this->getMyModal()->getRandomId();
        if(isset($_POST['Branches']) || isset($_POST['choices']))
            parent::__construct($this->getMyModal(), function($myFile){
            return $this->saveFlexTable($myFile, $myFile[$myFile['Setting']['Language']][$_GET['id']]['ErrorsMessageReq']);

        });
        //for edit user
        else if(isset($_POST['id'])){
            parent::__construct($this->getMyModal(), $_POST['id']);
            $this->getMyModal()->saveModel($this->saveFlexTable($this->getMyModal()->getObj(), $this->getErrorsMessageReq()));
        }else//for create user
            $this->getMyModal()->saveModel($this->saveFlexTable($this->getMyModal()->getObj(), $this->getErrorsMessageReq()));
        MyFlexTablesView::initMyFlexTablesView(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
    }
    function saveFlexTable($myData, $keysInput){
        foreach ($keysInput as $key => $value)
            $myData[$_GET['id']][$this->keyId][$key] = $_POST[$key];
        return $myData;
    }
}
new FlexTablesCreatePost();
}else
    header('LOCATION:index');
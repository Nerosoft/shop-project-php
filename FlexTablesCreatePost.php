<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesCreatePost extends ValidationId{
    use ErrorFlexTable;
    private $keyId;
    function __construct(){
        $this->keyId = isset($_POST['id'])?$_POST['id']:$this->getRandomId();
        parent::__construct($_GET['id'], function($myFile){
            return $this->saveFlexTable($myFile, $myFile[$myFile['Setting']['Language']][$_GET['id']]['ErrorsMessageReq']);

        }, 'MyFlexTables');
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->saveModel($this->saveFlexTable($this->getObj(), $this->getErrorsMessageReq()));
        MyFlexTablesView::initMyFlexTablesView(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
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
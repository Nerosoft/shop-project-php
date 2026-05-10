<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'controller/MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesCreatePost extends ValidationId{
    use ErrorFlexTable;
    private $keyId;
    function __construct(){
        $this->keyId = isset($_POST['id'])?$_POST['id']:$this->getRandomId();
        parent::__construct($_GET['id'], function($myFile, $idSseion){
            return $this->saveFlexTable($myFile, $myFile[$myFile['Setting']['Language']][$_GET['id']]['ErrorsMessageReq'], $idSseion);

        }, 'MyFlexTables');
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->saveModel($this->saveFlexTable($this->getObj(), $this->getErrorsMessageReq(), $this->getId()));
        $this->initViewPost(isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate', 'success');
    }
    function saveFlexTable($myData, $keysInput, $idSseion){
        foreach ($keysInput as $key => $value)
            $myData[$_GET['id']][$this->keyId][$key] = $_POST[$key];
        $this->saveProductTable($idSseion);
        return $myData;
    }
}
new FlexTablesCreatePost();
}else
    header('LOCATION:index');
<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView($_GET['id'], isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate', 'success', function(){
class FlexTablesCreatePost extends ValidationId{
    use ErrorFlexTable;
    private $keyId;
    function __construct(){
        $this->keyId = isset($_POST['id'])?$_POST['id']:$this->getRandomId();
        parent::__construct($_GET['id'], function($myFile, $idSseion){
            return $this->saveFlexTable($myFile, $myFile[$myFile['Setting']['Language']][$_GET['id']]['ErrorsMessageReq'], $idSseion);

        }, isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
        $this->saveModel($this->saveFlexTable($this->getObj(), $this->getErrorsMessageReq(), $this->getId()));
    }
    function saveFlexTable($myData, $keysInput, $idSseion){
        foreach ($keysInput as $key => $value)
            $myData[$_GET['id']][$this->keyId][$key] = $_POST[$key];
        $this->saveProductTable($idSseion);
        return $myData;
    }
}
new FlexTablesCreatePost();
});
}else
    header('LOCATION:index');
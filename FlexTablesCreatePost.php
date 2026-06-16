<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('MyFlexTablesView', isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate', 'success', function(){
class FlexTablesCreatePost extends ValidationId{
    use ErrorFlexTable;
    function __construct(){
        parent::__construct($_GET['id'], function($myFile, $idSseion){
            return $this->saveFlexTable($myFile, $myFile[$myFile['Setting']['AllNamesLanguage']][$_GET['id']]['ErrorsMessageReq'], $idSseion);

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
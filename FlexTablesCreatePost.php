<?php
include 'auth/SessionAdmin.php';
require 'auth/test_session4.php';
class FlexTablesCreatePost extends ModelJson{
    use ErrorFlexTable;
    function __construct(){
        parent::__construct(null, function($myFile, $idSseion){
            return $this->saveFlexTable($myFile, $myFile[$myFile['AllNamesLanguage']][$this->getUrlName2()]['ErrorsMessageReq'], $idSseion);

        }, isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
        $this->initErrorFlexTable2();
        $this->saveModel($this->saveFlexTable($this->getObj(), $this->getErrorsMessageReq(), $this->getId()));
        $this->showMessage($this->getModelPage()[isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate']);
    }
    function saveFlexTable($myData, $keysInput, $idSseion){
        foreach ($keysInput as $key => $value)
            $myData[$this->getUrlName2()][$this->keyId][$key] = $_POST[$key];
        $this->saveProductTable($idSseion);
        return $myData;
    }
}
new FlexTablesCreatePost();
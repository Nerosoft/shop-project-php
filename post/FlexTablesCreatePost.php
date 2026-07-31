<?php
// require 'auth/test_session4.php';
class FlexTablesCreatePost extends ModelJson{
    function __construct(){
        parent::__construct(null, function($myFile, $idSseion){
            return $this->saveFlexTable($myFile, $myFile[$myFile['AllNamesLanguage']][$this->getUrlName2()]['ErrorsMessageReq'], $idSseion);
        }, isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getView(){
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
$view = new FlexTablesCreatePost();
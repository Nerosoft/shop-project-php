<?php
include 'auth/SessionAdmin.php';
class HomeEditPost extends ModelJson{
    use ErrorsHome;
    function __construct(){
        parent::__construct('Home', function ($myFile){
            return $this->editHome($myFile, $myFile[$myFile['AllNamesLanguage']]['AllNamesLanguage']);
        }, 'MessageModelEdit'); 
        $this->saveModel($this->editHome($this->getObj(), $this->getModel2()['AllNamesLanguage']));
        $this->showMessage($this->getModelPage()['MessageModelEdit']);
    }
    function editHome($myData, $AllNamesLanguage){
        foreach ($AllNamesLanguage as $code => $value) 
            $myData[$code]['MyFlexTables'][$this->keyId] = $_POST['name'];
        return $myData;
    }
}
new HomeEditPost();
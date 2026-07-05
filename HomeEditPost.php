<?php
include 'auth/SessionPost.php';
class HomeEditPost extends ValidationId{
    use ErrorsHome;
    function __construct(){
        parent::__construct(function ($myFile){
            return $this->editHome($myFile, $myFile[$myFile['Setting']['AllNamesLanguage']]['AllNamesLanguage']);
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
<?php
include 'auth/SessionAdmin.php';
require 'auth/test_session4.php';
 class HomeCreatePost extends ModelJson{
    use ErrorsHome;
    private $keysInput = array();
    function __construct(){
        
        parent::__construct('Home', function($myFile){
            return $this->saveFelxTable($myFile[$myFile['AllNamesLanguage']]['AllNamesLanguage'], $myFile);
        }, 'MessageModelCreate', ModelJson::getRandomKey()); 
        $this->saveModel($this->saveFelxTable($this->getModel2()['AllNamesLanguage'], $this->getObj()));
        $this->showMessage($this->getModelPage()['MessageModelCreate']);
    }
    function saveFelxTable($AllNamesLanguage, $myData){
        foreach ($AllNamesLanguage as $code => $value) {
            $myData[$code]['MyFlexTables'][$this->keyId] = $_POST['name'];
            $myData[$code][$this->keyId] = $myData[$code]['Home']['TablePage'];
            $myData[$code][$this->keyId]['MYTITLE'] = $_POST['name'];
            foreach ($this->keysInput as $key2 => $myInputKey){
                $myData[$code][$this->keyId]['TableHead'][$myInputKey] = $myData[$code]['Home']['InputNameTable'];
                $myData[$code][$this->keyId]['Label'][$myInputKey] = $myData[$code]['Home']['InputLabel'];
                $myData[$code][$this->keyId]['Hint'][$myInputKey] = $myData[$code]['Home']['InputHint'];
                $myData[$code][$this->keyId]['ErrorsMessageReq'][$myInputKey] = $myData[$code]['Home']['InputErrorsMessageReq'];
                $myData[$code][$this->keyId]['ErrorsMessageInv'][$myInputKey] = $myData[$code]['Home']['InputErrorsMessageInv'];
            }
        }
        return $myData;
    }
}
new HomeCreatePost();


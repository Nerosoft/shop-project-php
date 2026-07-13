<?php
include 'auth/SessionAdmin.php';
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
            $myData[$code][$this->keyId] = $myData[$code]['AppSettingAdmin']['TablePage'];
            $myData[$code][$this->keyId]['MYTITLE'] = $_POST['name'];
            foreach ($this->keysInput as $key2 => $myInputKey){
                $myData[$code][$this->keyId]['TableHead'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputNameTable'];
                $myData[$code][$this->keyId]['Label'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputLabel'];
                $myData[$code][$this->keyId]['Hint'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputHint'];
                $myData[$code][$this->keyId]['ErrorsMessageReq'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageReq'];
                $myData[$code][$this->keyId]['ErrorsMessageInv'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageInv'];
            }
        }
        return $myData;
    }
}
new HomeCreatePost();


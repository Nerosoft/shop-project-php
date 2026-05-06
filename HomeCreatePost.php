<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'controller/MyHome.php';
require 'ValidationId.php';
class HomeCreatePost extends ValidationId{
    use ErrorsHome;
    private $keyId;
    private $keysInput;
    function __construct(){
        $this->keyId = $this->getRandomId();
        $this->keysInput = isset($_POST['input_number'])?$this->getArrayKeys():array();
        parent::__construct('Home', function($myFile){
            return $this->saveFelxTable($myFile[$myFile['Setting']['Language']]['AllNamesLanguage'], $myFile);
        }); 
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->saveModel($this->saveFelxTable($this->getModel2()['AllNamesLanguage'], $this->getObj()));
        MyHome::initHome('MessageModelCreate');
    }
    function saveFelxTable($AllNamesLanguage, $myData){
        foreach ($AllNamesLanguage as $code => $value) {
            $myData[$code]['MyFlexTables'][$this->keyId] = $_POST['name'];
            $myData[$code][$this->keyId] = $myData[$code]['TablePage'];
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
}else
    header('LOCATION:index');
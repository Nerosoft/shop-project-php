<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeCreatePost extends ValidationId{
    use ErrorsHome;
    private $modal;
    private $keyId;
    private $keysInput;
    function __construct(){
        $this->modal = new ModelJson('Home');
        $this->initErrorsHome2($this->getMyModal());
        $this->keyId = $this->getMyModal()->getRandomId();
        $this->keysInput = $this->getMyModal()->getArrayKeys();
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->saveFelxTable($this->getMyModal()->getModel2()['AllNamesLanguage'], $this->getMyModal()->getObj()));
        else 
            parent::__construct($this->getMyModal(), function($myFile){
                return $this->saveFelxTable($myFile[$myFile['Setting']['Language']]['AllNamesLanguage'], $myFile);
        }); 
        MyHome::initHome('MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
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
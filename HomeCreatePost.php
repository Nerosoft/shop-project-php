<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeCreatePost extends ValidationId{
    use ErrorsHome;
    function saveFelxTable($AllNamesLanguage, $myData, $key){
        foreach ($AllNamesLanguage as $code => $value) {
            $myData[$code]['MyFlexTables'][$key] = $_POST['name'];
            $myData[$code][$key] = $myData[$code]['TablePage'];
            $myData[$code][$key]['MYTITLE'] = $_POST['name'];
            for ($i=0; $i < $_POST['input_number']; $i++){
                $myInputKey = $this->getRandomId();
                $myData[$code][$key]['TableHead'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputNameTable'];
                $myData[$code][$key]['Label'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputLabel'];
                $myData[$code][$key]['Hint'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputHint'];
                $myData[$code][$key]['ErrorsMessageReq'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageReq'];
                $myData[$code][$key]['ErrorsMessageInv'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageInv'];
            }
        }
        return $myData;
    }
    function __construct(){
        parent::__construct('Home');
        $this->initErrorsHome2($this->getMyModal());
        $key = $this->getRandomId();
        if(!isset($_POST['input_number']) || $_POST['input_number'] === '')
            MyHome::initHome($this->getInputNumberTableIsReq(), 'danger');
        else if(!is_numeric($_POST['input_number']) || $_POST['input_number'] > 8)
            MyHome::initHome($this->getInputNumberTableIsInv(), 'danger');
        else if(isset($_POST['Branches']) || isset($_POST['choices'])){
            $myData = $this->getFile();
            foreach (isset($_POST['Branches']) ? $this->getFileByFixedId()['Branches'] : $_POST['choices'] as $keyBranch => $value) 
                $myData[$keyBranch] = $this->saveFelxTable($myData[$keyBranch][$myData[$keyBranch]['Setting']['Language']]['AllNamesLanguage'], $myData[$keyBranch], $key);
            $this->saveFile($myData);
        }
        else
           $this->saveModel($this->saveFelxTable($this->getModel2()['AllNamesLanguage'], $this->getObj(), $key));
        MyHome::initHome('MessageModelCreate');
    }
}

new HomeCreatePost();
}else
    header('LOCATION:index');
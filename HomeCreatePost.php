<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
class HomeCreatePost extends ModelJson{
    use ErrorsHome;
    function __construct(){
        parent::__construct('Home');
        $this->initErrorsHome2($this->getMyModal());
        if(!isset($_POST['input_number']) || $_POST['input_number'] === '')
            MyHome::initHome($this->getInputNumberTableIsReq(), 'danger');
        else if(!is_numeric($_POST['input_number']) || $_POST['input_number'] > 8)
            MyHome::initHome($this->getInputNumberTableIsInv(), 'danger');
        else{
            $key = $this->getRandomId();
            $myData = $this->getObj();
            foreach ($this->getModel2()['AllNamesLanguage'] as $code => $value) {
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
            $this->saveModel($myData);
            MyHome::initHome('MessageModelCreate');
        }
    }
}

new HomeCreatePost();
}else
    header('LOCATION:view?id=Home');
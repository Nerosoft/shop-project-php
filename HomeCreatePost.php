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
            if(isset($_POST['Branches']) && $_POST['Branches'] === 'all' && count($this->getFileByFixedId()['Branches']) > 1 || isset($_POST['choices']) && count($this->getFileByFixedId()['Branches']) > 1 && $this->validBranchKeys()){
                $myData = $this->getFile();
                foreach (isset($_POST['Branches']) ? $this->getFileByFixedId()['Branches'] : $_POST['choices'] as $keyBranch => $value) {
                    foreach ($myData[$keyBranch][$myData[$keyBranch]['Setting']['Language']]['AllNamesLanguage'] as $code => $value) {
                        $myData[$keyBranch][$code]['MyFlexTables'][$key] = $_POST['name'];
                        $myData[$keyBranch][$code][$key] = $myData[$keyBranch][$code]['TablePage'];
                        $myData[$keyBranch][$code][$key]['MYTITLE'] = $_POST['name'];
                        for ($i=0; $i < $_POST['input_number']; $i++){
                            $myInputKey = $this->getRandomId();
                            $myData[$keyBranch][$code][$key]['TableHead'][$myInputKey] = $myData[$keyBranch][$code]['AppSettingAdmin']['InputNameTable'];
                            $myData[$keyBranch][$code][$key]['Label'][$myInputKey] = $myData[$keyBranch][$code]['AppSettingAdmin']['InputLabel'];
                            $myData[$keyBranch][$code][$key]['Hint'][$myInputKey] = $myData[$keyBranch][$code]['AppSettingAdmin']['InputHint'];
                            $myData[$keyBranch][$code][$key]['ErrorsMessageReq'][$myInputKey] = $myData[$keyBranch][$code]['AppSettingAdmin']['InputErrorsMessageReq'];
                            $myData[$keyBranch][$code][$key]['ErrorsMessageInv'][$myInputKey] = $myData[$keyBranch][$code]['AppSettingAdmin']['InputErrorsMessageInv'];
                        }
                    }
                }
                $this->saveFile($myData);
            }else{
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
            }
            MyHome::initHome('MessageModelCreate');
        }
    }
}

new HomeCreatePost();
}else
    header('LOCATION:index');
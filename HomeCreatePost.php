<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    ModelJson::initView('Home', 'MessageModelCreate', 'success', function(){
        class HomeCreatePost extends ValidationId{
            use ErrorsHome;
            private $keysInput = array();
            function __construct(){
                if(isset($_POST['input_number']) && is_numeric($_POST['input_number']))
                    for ($i=0; $i < $_POST['input_number']; $i++)
                        array_push($this->keysInput, $this->getRandomId());
                parent::__construct('Home', function($myFile){
                    return $this->saveFelxTable($myFile[$myFile['Setting']['Language']]['AllNamesLanguage'], $myFile);
                }, 'MessageModelCreate'); 
                $this->saveModel($this->saveFelxTable($this->getModel2()['AllNamesLanguage'], $this->getObj()));
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
    });
}else
    header('LOCATION:index');
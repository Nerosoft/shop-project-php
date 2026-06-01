<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    ModelJson::initView('Home', 'MessageModelCreate', 'success', function(){
        class HomeCreatePost extends ValidationId{
            use ErrorsHome;
            function __construct(){
                parent::__construct('Home', function($myFile){
                    return $this->saveFelxTable($myFile[$myFile['Setting']['Language']]['AllNamesLanguage'], $myFile);
                }, 'MessageModelCreate'); 
                $this->saveModel($this->saveFelxTable($this->getModel2()['AllNamesLanguage'], $this->getObj()));
            }
            function saveFelxTable($AllNamesLanguage, $myData){
                $myInputKey = array('cnasnc2354uia', 'vubiwncin234qpw', 'o3mviw86msdi', 'mjqevirjevubi', 'mviowjf86o13qc', 'pfovmui363wbbowqd', 'mfi02j9vj0an', ',f930jf892');
                foreach ($AllNamesLanguage as $code => $value) {
                    $myData[$code]['MyFlexTables'][$this->keyId] = $_POST['name'];
                    $myData[$code][$this->keyId] = $myData[$code]['TablePage'];
                    $myData[$code][$this->keyId]['MYTITLE'] = $_POST['name'];
                    for ($i=0; $i <$_POST['input_number'] ; $i++) { 
                        $myData[$code][$this->keyId]['TableHead'][$myInputKey[$i]] = $myData[$code]['AppSettingAdmin']['InputNameTable'];
                        $myData[$code][$this->keyId]['Label'][$myInputKey[$i]] = $myData[$code]['AppSettingAdmin']['InputLabel'];
                        $myData[$code][$this->keyId]['Hint'][$myInputKey[$i]] = $myData[$code]['AppSettingAdmin']['InputHint'];
                        $myData[$code][$this->keyId]['ErrorsMessageReq'][$myInputKey[$i]] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageReq'];
                        $myData[$code][$this->keyId]['ErrorsMessageInv'][$myInputKey[$i]] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageInv'];
                    }
                }
                return $myData;
            }
        }
        new HomeCreatePost();
    });
}else
    header('LOCATION:index');
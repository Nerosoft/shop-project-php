<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['option']) || !isset($_POST['state']) || isset($_POST['state']) && $_POST['state'] !== 'Style' && $_POST['state'] !== 'AllNamesLanguage')
    header('LOCATION:index');
else
    ModelJson::initView(($_POST['state'] === 'AllNamesLanguage'? 'ChangeLanguage':'MyStyle'), $_POST['state'] === 'Style'?'MessageStyleLang2':'MessageStyleLang', 'success', function(){

    class ChangeLanguagePost extends ValidationId{
        function __construct(){
            parent::__construct(($_POST['state'] === 'AllNamesLanguage'? 'ChangeLanguage':'MyStyle'), function($myFile){
                return $this->changeLangStylePost($myFile);
            }, 'MessageStyleLang');
            $this->saveModel($this->changeLangStylePost($this->getObj()));
        }
        function changeLangStylePost($myData){
            $myData['Setting'][$_POST['state']] = $this->keyId;
            return $myData;
        }
    }
    new ChangeLanguagePost();
    });

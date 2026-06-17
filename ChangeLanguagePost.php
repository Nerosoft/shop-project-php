<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['option']) || !isset($_POST['state']) || isset($_POST['state']) && $_POST['state'] !== 'Style' && $_POST['state'] !== 'AllNamesLanguage')
    header('LOCATION:index');
else
    ModelJson::initView(($_POST['option'] === 'Home' ||
            $_POST['option'] === 'HomeCreatePost' ||
            $_POST['option'] === 'Branches' ||
            $_POST['option'] === 'ChangeLanguage' ||
            $_POST['option'] === 'Users' ||
            $_POST['option'] === 'Product' ||
            $_POST['option'] === 'SystemLang' ||
            $_POST['option'] === 'MyStyle'? $_POST['option']:'MyFlexTablesView'), $_POST['state'] === 'Style'?'MessageStyleLang2':'MessageStyleLang', 'success', function(){

    class ChangeLanguagePost extends ValidationId{
        function __construct(){
            parent::__construct($_POST['option'], function($myFile){
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

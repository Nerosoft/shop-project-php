<?php
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Login' && $_POST['state'] === 'lang'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Register' && $_POST['state'] === 'lang'||
 
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Login' && $_POST['state'] === 'style'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Register' && $_POST['state'] === 'style'){
    $_SERVER['SCRIPT_FILENAME'] = $_POST['change_language'];
    require  $_POST['change_language'] === 'Login'?'MyLogin.php':'MyRegister.php';
    require 'ValidationId.php';
    class ChangeLangPost extends ValidationId{
        function __construct(){
            parent::__construct($_POST['change_language']);
            setcookie($this->getId().$_POST['state'], $_POST['id'], time()+2628000);
            $_COOKIE[$this->getId().$_POST['state']] = $_POST['id'];
            $this->initViewPost($_POST['state'] === 'lang'?$this->getModelPage()['ChangeLang'].' '.$this->getModel2()['AllNamesLanguage'][$_POST['id']]:$this->getModelPage()['ChangeStyleMessage'].' '.$this->getModel2()['Style'][$_POST['id']], 'success');
        }
    }
new ChangeLangPost();
}else
    header('LOCATION:Login');
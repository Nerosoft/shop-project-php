<?php
// include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Login' && $_POST['state'] === 'lang'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Register' && $_POST['state'] === 'lang'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Site' && $_POST['state'] === 'lang'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Site' && $_POST['state'] === 'style'||
 
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Login' && $_POST['state'] === 'style'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Register' && $_POST['state'] === 'style'){
    $_SERVER['SCRIPT_FILENAME'] = $_POST['change_language'];
    require  $_POST['change_language'] === 'Site'?'Site.php':($_POST['change_language'] === 'Login'?'MyLogin.php':'MyRegister.php');
    require 'ValidationId.php';
    class ChangeLangPost extends ValidationId{
        private $modal;
        function __construct(){
            //exit;
            $this->modal = new ModelJson($_POST['change_language']);
            parent::__construct($this->getMyModal());
            setcookie($this->getMyModal()->getId().$_POST['state'], $_POST['id'], time()+2628000);
            $_COOKIE[$this->getMyModal()->getId().$_POST['state']] = $_POST['id'];
            $this->getMyModal()->initViewPost($_POST['state'] === 'lang'?$this->getMyModal()->getModelPage()['ChangeLang'].' '.$this->getMyModal()->getModel2()['AllNamesLanguage'][$_POST['id']]
            :$this->getMyModal()->getModelPage()['ChangeStyleMessage'].' '.$this->getMyModal()->getModel2()['Style'][$_POST['id']], 'success');
        }
        function getMyModal(){
            return $this->modal;
        }
    }
new ChangeLangPost();
}else
    header('LOCATION:Login');
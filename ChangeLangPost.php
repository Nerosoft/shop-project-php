<?php
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Login' && $_POST['state'] === 'AllNamesLanguage'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Register' && $_POST['state'] === 'AllNamesLanguage'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Site' && $_POST['state'] === 'AllNamesLanguage'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Site' && $_POST['state'] === 'Style'||
 
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Login' && $_POST['state'] === 'Style'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Register' && $_POST['state'] === 'Style'){
    if($_POST['change_language'] === 'Site')
        require 'controller/MySite.php';
    else if($_POST['change_language'] === 'Register'){
        require  'controller/LoginRegister.php';
        require 'controller/MyRegister.php';
    }else
        require 'controller/LoginRegister.php';
    require 'ValidationId.php';
    class ChangeLangPost extends ValidationId{
        function __construct(){
            parent::__construct($_POST['change_language']);
            setcookie($this->getId().$_POST['state'], $_POST['id'], time()+2628000);
            $_COOKIE[$this->getId().$_POST['state']] = $_POST['id'];
            $this->initViewPost($this->getModelPage()[$_POST['state'] === 'AllNamesLanguage'?'ChangeLang':'ChangeStyleMessage'].' '.$this->getModel2()[$_POST['state']][$_POST['id']], 'success');
        }
    }
new ChangeLangPost();
}else
    header('LOCATION:Login');
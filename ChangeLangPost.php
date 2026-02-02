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
            $this->validStaticId();
            if($this->isEmptyErrors()){
                setcookie($this->getId().$_POST['state'], $_POST['id'], time()+2628000);
                $_COOKIE[$this->getId().$_POST['state']] = $_POST['id'];
                $view = $_POST['change_language'] === 'Login'?new MyLogin($_POST['state'] === 'lang'?'ChangeLang':'ChangeStyleMessage'):new MyRegister($_POST['state'] === 'lang'?'ChangeLang':'ChangeStyleMessage');
            }else{
                $view = $_POST['change_language'] === 'Login'?new MyLogin():new MyRegister();
                $this->displayErrors();
            }
            include $_POST['change_language'] === 'Login'?'login_view.php':'register_view.php';
        }
    }
new ChangeLangPost();
}else
    header('LOCATION:Login');
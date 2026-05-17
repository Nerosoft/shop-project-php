<?php
include 'auth/SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Login' && $_POST['state'] === 'AllNamesLanguage'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Register' && $_POST['state'] === 'AllNamesLanguage'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Site' && $_POST['state'] === 'AllNamesLanguage'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Site' && $_POST['state'] === 'Style'||
 
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Login' && $_POST['state'] === 'Style'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['state']) && $_POST['change_language'] === 'Register' && $_POST['state'] === 'Style'){
ModelJson::initView($_POST['change_language'], $_POST['state'] === 'AllNamesLanguage'?'ChangeLang':'ChangeStyleMessage', 'success', function(){
    class ChangeLangPost extends ValidationId{
        function __construct(){
            parent::__construct($_POST['change_language']);
            setcookie($this->getId().$_POST['state'], $_POST['id'], time()+2628000);
            $_COOKIE[$this->getId().$_POST['state']] = $_POST['id'];
        }
    }
    new ChangeLangPost();
});
}else
    header('LOCATION:Login');
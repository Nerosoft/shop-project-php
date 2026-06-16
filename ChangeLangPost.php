<?php
include 'auth/SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && isset($_POST['state']) && $_POST['option'] === 'Login' && $_POST['state'] === 'AllNamesLanguage'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && isset($_POST['state']) && $_POST['option'] === 'Register' && $_POST['state'] === 'AllNamesLanguage'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && isset($_POST['state']) && $_POST['option'] === 'Site' && $_POST['state'] === 'AllNamesLanguage'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && isset($_POST['state']) && $_POST['option'] === 'Site' && $_POST['state'] === 'Style'||
 
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && isset($_POST['state']) && $_POST['option'] === 'Login' && $_POST['state'] === 'Style'||
 $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['option']) && isset($_POST['state']) && $_POST['option'] === 'Register' && $_POST['state'] === 'Style'){
ModelJson::initView($_POST['option'], $_POST['state'] === 'AllNamesLanguage'?'ChangeLang':'ChangeStyleMessage', 'success', function(){
    class ChangeLangPost extends ValidationId{
        function __construct(){  
            parent::__construct($_POST['option']);
            setcookie($this->getId().$_POST['state'], $this->keyId, time()+2628000);
            $_COOKIE[$this->getId().$_POST['state']] = $this->keyId;
        }
    }
    new ChangeLangPost();
});
}else
    header('LOCATION:Login');
<?php
include 'auth/SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['option']) || !isset($_POST['state']) || isset($_POST['option']) && $_POST['option'] !== 'Login' && $_POST['option'] !== 'Register' && $_POST['option'] !== 'Site'|| isset($_POST['state']) && $_POST['state'] !== 'AllNamesLanguage' && $_POST['state'] !== 'Style')
    header('LOCATION:Login');
else
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
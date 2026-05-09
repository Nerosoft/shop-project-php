<?php
require 'LoginRegister.php';
class MyLogin extends LoginRegister{
    function __construct($message, $type){
        parent::__construct('Login', $message, $type, 'LoginPost.php');
       
    }
    static function initMyLogin($message = 'LoadMessage', $type = 'success'){
        $view = new MyLogin($message, $type);
        include 'views/login_view.php';
        exit;
    }
   
}
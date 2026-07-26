<?php
class Login extends ModelJson{
    function __construct(){
        parent::__construct('Login', 'LoginPost');
    }
}
new Login();

<?php
include 'auth/SessionAdmin.php';
require 'controller/InformationPage.php';
if(ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register')
    require 'controller/LoginRegister.php';
else if(ModelJson::getFileName() !== 'Site')
    $count = 1;
require 'controller/AdminMenu.php';
require 'controller/'.(ModelJson::getFileName() === 'index'?'Home':ModelJson::getFileName()).'.php';
include 'pis_of_page/end_html.php';

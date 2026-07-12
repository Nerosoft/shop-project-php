<?php
include 'auth/SessionAdmin.php';
require 'class_object/MyLanguage.php';
require 'class_object/BranchClass.php';
if(ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register'){
    require 'all_trait/InfoBranch.php';
    require 'all_trait/InterEmailPass.php';
}
else if(ModelJson::getFileName() !== 'Site' && ModelJson::getFileName() !== 'Login' && ModelJson::getFileName() !== 'Register')
    $count = 1;
require 'controller/'.ModelJson::getFileName().'.php';
include 'pis_of_page/end_html.php';

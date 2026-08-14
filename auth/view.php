<?php
require 'auth/SessionAdmin.php';
require 'class_object/MyLanguage.php';
require 'class_object/BranchClass.php';
require 'controller/'.ModelJson::getFileName().'.php';
$view->setupMenu(ModelJson::getFileName() === 'Site'?'':'container');

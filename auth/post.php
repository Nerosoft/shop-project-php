<?php
require 'auth/SessionAdmin.php';
require 'post/'.ModelJson::getFileName().'.php';
$view->getView();
$view->showMessage();
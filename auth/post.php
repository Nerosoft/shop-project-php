<?php
require 'auth/SessionAdmin.php';
require 'post/'.ModelJson::getFileName().'.php';
$view->makePost();
$view->getView();
$view->showMessage();
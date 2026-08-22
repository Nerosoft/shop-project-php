<?php
require 'controller/ModelJson.php';
require 'post/'.ModelJson::getFileName().'.php';
$view->makePost();
$view->showMessage();
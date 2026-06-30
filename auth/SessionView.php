<?php
$count = 1;
include 'auth/SessionAdmin.php';
require 'controller/AdminMenu.php';
require 'controller/'.(ModelJson::getFileName() === 'index'?'Home':ModelJson::getFileName()).'.php';
include 'pis_of_page/end_html.php';

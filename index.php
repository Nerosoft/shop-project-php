<?php
include 'auth/SessionAdmin.php';
ModelJson::initView('Home', $_GET['message']??'LoadMessage');
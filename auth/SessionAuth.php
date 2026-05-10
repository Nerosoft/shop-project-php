<?php
session_start();
if(isset($_SESSION['userId'])){
    header("Location:index");
    exit;
}
require 'controller/LoginRegister.php';
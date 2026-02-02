<?php
session_start();
if(isset($_SESSION['userId'])){
    header("Location: home.php");
    exit;
}
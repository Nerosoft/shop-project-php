<?php
session_start();
if(isset($_SESSION['userId'])){
    header("Location:view?id=Home");
    exit;
}
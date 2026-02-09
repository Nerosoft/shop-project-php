<?php
session_start();
if(isset($_SESSION['userId']))
    unset($_SESSION['userId'], $_SESSION['staticId']);
header("Location:login");
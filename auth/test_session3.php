<?php
if(isset($_SESSION['userId'])){
    header('Location:Home');
    exit;
}else if($_SERVER["REQUEST_METHOD"] !== "POST"){
    header('Location:Login');
    exit;
}
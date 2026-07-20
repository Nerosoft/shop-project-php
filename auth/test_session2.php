<?php
if(!isset($_SESSION['userId'])){
    header('Location:Login');
    exit;
}else if($_SERVER["REQUEST_METHOD"] !== "GET"){
    header('Location:'.ModelJson::getFileName());
    exit;
}
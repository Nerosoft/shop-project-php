<?php
if(isset($_SESSION['userId'])){
    header('Location:Home');
    exit;
}else if($_SERVER["REQUEST_METHOD"] !== "GET"){
    header('Location:'.ModelJson::getFileName());
    exit;
}
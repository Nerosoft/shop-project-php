<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeCreatePost extends ValidationId{
    use ErrorsHome;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Home');
        $this->initErrorsHome2($this->getMyModal());
        if(!isset($_POST['input_number']) || $_POST['input_number'] === '')
            MyHome::initHome($this->getInputNumberTableIsReq(), 'danger');
        else if(!is_numeric($_POST['input_number']) || $_POST['input_number'] > 8)
            MyHome::initHome($this->getInputNumberTableIsInv(), 'danger');        
        else if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->saveFelxTable($this->getMyModal()->getModel2()['AllNamesLanguage'], $this->getMyModal()->getObj(), $this->getMyModal()->getRandomId(), $this->getMyModal()->getArrayKeys()));
        else 
            parent::__construct($this->getMyModal(), $this->getMyModal()->getRandomId(), $this->getMyModal()->getArrayKeys()); 
        MyHome::initHome('MessageModelCreate');
    }
    function getMyModal(){
        return $this->modal;
    }
}

new HomeCreatePost();
}else
    header('LOCATION:index');
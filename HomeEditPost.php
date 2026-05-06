<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'controller/MyHome.php';
require 'ValidationId.php';
class HomeEditPost extends ValidationId{
    use ErrorsHome;
    function __construct(){
        parent::__construct('Home', function ($myFile){
            return $this->editHome($myFile, $myFile[$myFile['Setting']['Language']]['AllNamesLanguage']);
        }); 
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->saveModel($this->editHome($this->getObj(), $this->getModel2()['AllNamesLanguage']));
        MyHome::initHome('MessageModelEdit');
    }
    function editHome($myData, $AllNamesLanguage){
        foreach ($AllNamesLanguage as $code => $value) 
            $myData[$code]['MyFlexTables'][$_POST['id']] = $_POST['name'];
        return $myData;
    }
}
new HomeEditPost();
}else
    header('LOCATION:index');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeEditPost extends ValidationId{
    use ErrorsHome;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Home');
        $this->initErrorsHome3($this->getMyModal()->getModelPage());
        $this->validName();
        parent::__construct($this->getMyModal(), function ($myFile){
            return $this->editHome($myFile, $myFile[$myFile['Setting']['Language']]['AllNamesLanguage']);
        }); 
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->editHome($this->getMyModal()->getObj(), $this->getMyModal()->getModel2()['AllNamesLanguage']));
        MyHome::initHome('MessageModelEdit');
    }
    function getMyModal(){
        return $this->modal;
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
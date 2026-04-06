<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeDeletePost extends ValidationId{
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('Home');
        parent::__construct($this->getMyModal(), function($myFile){
            return $this->deleteHome($myFile);
        }); 
        if(!isset($_POST['Branches']) && !isset($_POST['choices']))
            $this->getMyModal()->saveModel($this->deleteHome($this->getMyModal()->getObj()));
        MyHome::initHome('Delete');
    }
    function getMyModal(){
        return $this->modal;
    }
    function deleteHome($myData){
        foreach ($myData[$myData['Setting']['Language']]['AllNamesLanguage'] as $key => $value) 
            if(count($myData[$key]['MyFlexTables']) === 1)
                unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables']);
            else
                unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables'][$_POST['id']]);
        if(isset($myData[$_POST['id']]))
            unset($myData[$_POST['id']]);
        return $myData;
    }
}
new HomeDeletePost();
}else
    header('LOCATION:index');
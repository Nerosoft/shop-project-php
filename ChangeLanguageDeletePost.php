<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageDeletePost extends ValidationId{
    use ErrorChangelanguageAllNames;
    private $modal;
    function __construct(){
        $this->modal = new ModelJson('ChangeLanguage');
        parent::__construct($this->getMyModal(), function($myFile){
            return $this->deleteLanguage($myFile);
        });
        if(!isset($_POST['Branches']) && !isset($_POST['choices'])){
            $this->initErrorChangelanguageAllNames($this->getMyModal()->getModel2()['AllNamesLanguage']);
            $this->getMyModal()->saveModel($this->deleteLanguage($this->getMyModal()->getObj()));
        }
        MyChangeLanguage::initMyChangeLanguage('Delete');
    }
    function getMyModal(){
        return $this->modal;
    }
    function deleteLanguage($myData){
        //delete language
        unset($myData[$_POST['id']]);
        foreach ($myData[$myData['Setting']['Language']]['AllNamesLanguage'] as $key=>$value)
            //delete name language inside AllNamesLanguage inside my language
            if($key !== $_POST['id'])
                unset($myData[$key]['AllNamesLanguage'][$_POST['id']]);
        return $myData;
    }
}
new ChangeLanguageDeletePost();
}else
    header('LOCATION:view?id=ChangeLanguage');
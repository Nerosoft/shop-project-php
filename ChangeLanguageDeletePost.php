<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageDeletePost extends ValidationId{
    use ErrorChangelanguageAllNames;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->initErrorChangelanguageAllNames($this->getModel2()['AllNamesLanguage']);
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            unset($myData[$_POST['id']]);
            foreach ($this->getallNames() as $key=>$value)
                if($key !== $_POST['id'])
                    unset($myData[$key]['AllNamesLanguage'][$_POST['id']]);
            $this->saveModel($myData);
            $view = new MyChangeLanguage('Delete');
        }else{
            $view = new MyChangeLanguage();
            $this->displayErrors();
        }
        include 'ChangeLanguage_view.php';
    }
}
new ChangeLanguageDeletePost();
}else
    header('LOCATION:ChangeLanguage');
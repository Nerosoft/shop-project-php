<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeEditPost extends ValidationId{
    use ErrorsHome;
    function __construct(){
        parent::__construct('Home');
        $this->initErrorsHome2($this->getMyModal());
        if(isset($_POST['Branches']) || isset($_POST['choices'])){
            $file = $this->getFile();
            foreach (isset($_POST['Branches']) ? $this->getFileByFixedId()['Branches'] : $_POST['choices'] as $keyBranch => $value)
                foreach($file[$keyBranch][$file[$keyBranch]['Setting']['Language']]['AllNamesLanguage'] as $code => $value) 
                    $file[$keyBranch][$code]['MyFlexTables'][$_POST['id']] = $_POST['name'];
            $this->saveFile($file);
        }else{
            $myData = $this->getObj();
            foreach ($this->getModel2()['AllNamesLanguage'] as $code => $value) 
                $myData[$code]['MyFlexTables'][$_POST['id']] = $_POST['name'];
            $this->saveModel($myData);
        }
        MyHome::initHome('MessageModelEdit');
    }
}
new HomeEditPost();
}else
    header('LOCATION:index');
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
class HomeCreatePost extends ModelJson{
    use ErrorsHome;
    function __construct(){
        parent::__construct('Home');
        $this->initErrorsHome2($this->getMyModal());
        if(!isset($_POST['input_number']) || $_POST['input_number'] === '')
            MyHome::initHome($this->getInputNumberTableIsReq(), 'danger');
        else if(!is_numeric($_POST['input_number']) || $_POST['input_number'] > 8)
            MyHome::initHome($this->getInputNumberTableIsInv(), 'danger');
        else{
            $key = $this->getRandomId();
            if(isset($_POST['Branches']) && count($this->getFileByFixedId()['Branches']) > 1 || isset($_POST['choices']) && count($this->getFileByFixedId()['Branches']) > 1 && $this->validBranchKeys()){
                $myData = $this->getFile();
                foreach (isset($_POST['Branches']) ? $this->getFileByFixedId()['Branches'] : $_POST['choices'] as $keyBranch => $value) 
                    $myData[$keyBranch] = $this->saveFelxTable($myData[$keyBranch][$myData[$keyBranch]['Setting']['Language']]['AllNamesLanguage'], $myData[$keyBranch], $this->getMyModal(), $key);
                $this->saveFile($myData);
            }else
                $this->saveModel($this->saveFelxTable($this->getModel2()['AllNamesLanguage'], $this->getObj(), $this->getMyModal(), $key));
            MyHome::initHome('MessageModelCreate');
        }
    }
}

new HomeCreatePost();
}else
    header('LOCATION:index');
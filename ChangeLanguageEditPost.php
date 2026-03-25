<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->validLanguageInput($this->getMyModal());
        if(isset($_POST['Branches']) || isset($_POST['choices'])){
            $file = $this->getFile();
            foreach (isset($_POST['Branches']) ? $this->getFileByFixedId()['Branches'] : $_POST['choices'] as $keyBranch => $value)
                $file[$keyBranch] = $this->saveNameLanguage($file[$keyBranch][$file[$keyBranch]['Setting']['Language']]['AllNamesLanguage'], 'AllNamesLanguage', $_POST['id'], $file[$keyBranch]);
            $this->saveFile($file);
        }else
            $this->saveModel($this->saveNameLanguage($this->getallNames(), 'AllNamesLanguage', $_POST['id'], $this->getObj()));
        MyChangeLanguage::initMyChangeLanguage('MessageModelEdit');
    }
}

new ChangeLanguageEditPost();
}else
    header('LOCATION:view?id=ChangeLanguage');
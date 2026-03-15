<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySystemlang.php';
class SystemLangEditPost extends ModelJson{
    use ErrorSystemlang;
    function validLanguage(){
        foreach ($_POST['choices'] as $key => $value)
            if(!isset($this->getModel2()['AllNamesLanguage'][$key]))
                return false;
        //add name language inside array choices
        $_POST['choices'][$_GET['lang']] = $_GET['lang'];
        return true;
    }
    function __construct(){
        parent::__construct('SystemLang');
        $this->initErrorSystemlang($this->getModelPage());
        if(!isset($_POST['word']) || $_POST['word'] === '')
            MySystemlang::initMySystemlang($this->getTextRequired(), 'danger');
        else if(strlen($_POST['word']) < 3 )
            MySystemlang::initMySystemlang($this->getTextLenght(), 'danger');
        else if(!isset($_GET['lang']) || !isset($_GET['table']) || !isset($_GET['key']) || !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']]) && !isset($_GET['array']) || isset($_GET['array']) && !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']]))
            MySystemlang::initMySystemlang($this->getModelPage()['ErrorFormInput'], 'danger');
        //check isset all language or name language
        else if(isset($_POST['Branches']) || isset($_POST['choices']) && $this->validLanguage()){
            $file = $this->getObj();
            if(isset($_GET['array']))
                foreach (isset($_POST['Branches'])?$this->getModel2()['AllNamesLanguage']:$_POST['choices'] as $key => $value)
                    $file[$key][$_GET['table']][$_GET['key']][$_GET['array']] = $_POST['word'];
            else
                foreach (isset($_POST['Branches'])?$this->getModel2()['AllNamesLanguage']:$_POST['choices'] as $key => $value)
                    $file[$key][$_GET['table']][$_GET['key']] = $_POST['word'];
            $this->saveModel($file);
        }
        else{
            $file = $this->getObj();
            if(isset($_GET['array']))
                $file[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']] = $_POST['word'];
            else
                $file[$_GET['lang']][$_GET['table']][$_GET['key']] = $_POST['word'];
            $this->saveModel($file);
        }
        MySystemlang::initMySystemlang('AllLanguageEdit');
    }
}
new SystemLangEditPost();
}else
    header('LOCATION:view?id=SystemLang');
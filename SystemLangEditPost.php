<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySystemlang.php';
class SystemLangEditPost extends ModelJson{
    use ErrorSystemlang;
    function __construct(){
        parent::__construct('SystemLang');
        $this->initErrorSystemlang($this->getModelPage());
        if(!isset($_POST['word']) || $_POST['word'] === '')
            MySystemlang::initMySystemlang($this->getTextRequired(), 'danger');
        else if(strlen($_POST['word']) < 3 )
            MySystemlang::initMySystemlang($this->getTextLenght(), 'danger');
        else if(!isset($_GET['lang']) || !isset($_GET['table']) || !isset($_GET['key']) || !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']]) && !isset($_GET['array']) || isset($_GET['array']) && !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']]))
            MySystemlang::initMySystemlang($this->getModelPage()['ErrorFormInput'], 'danger');
        else{
            $file = $this->getObj();
            if(isset($_GET['array']))
                $file[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']] = $_POST['word'];
            else
                $file[$_GET['lang']][$_GET['table']][$_GET['key']] = $_POST['word'];
            $this->saveModel($file);
            MySystemlang::initMySystemlang('AllLanguageEdit');
        }
    }
}
new SystemLangEditPost();
}else
    header('LOCATION:SystemLang');
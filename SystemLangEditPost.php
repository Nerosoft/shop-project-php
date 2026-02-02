<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySystemlang.php';
require 'MessageError.php';
class SystemLangEditPost extends MessageError{
    use ErrorSystemlang;
    function __construct(){
        parent::__construct('SystemLang');
        $this->initErrorSystemlang($this->getModelPage());
        $this->validStyleLang($this);
        if(!isset($_GET['lang']) || !isset($_GET['table']) || !isset($_GET['key']) || !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']]) && !isset($_GET['array']) || isset($_GET['array']) && !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']]))
            $this->setErrors($this->getModelPage()['ErrorFormInput']);
        if($this->isEmptyErrors()){
            $file = $this->getObj();
            if(isset($_GET['array']))
                $file[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']] = $_POST['word'];
            else
                $file[$_GET['lang']][$_GET['table']][$_GET['key']] = $_POST['word'];
            $this->saveModel($file);
            $view = new MySystemlang('AllLanguageEdit');
        }else{
            $view = new MySystemlang();
            $this->displayErrors();
        }
        include 'SystemLang_view.php';
    }
}
new SystemLangEditPost();
}else
    header('LOCATION:SystemLang');
<?php
include 'auth/SessionAdmin.php';
require 'auth/test_session4.php';
class SystemLangEditPost extends ModelJson{
    use ErrorSystemlang;
    private $file;
    function __construct(){
        parent::__construct('SystemLang');
        $this->file = $this->getObj();
        $this->initErrorSystemlang();
        if(!isset($_POST['word']) || $_POST['word'] === '')
            $this->showError($this->getTextRequired());
        else if(strlen($_POST['word']) < 3 )
            $this->showError($this->getTextLenght());
        else if(!isset($_GET['lang']) || !isset($_GET['table']) || !isset($_GET['key']) || !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']]) && !isset($_GET['array']) || isset($_GET['array']) && !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']]))
            $this->showError($this->getModelPage()['ErrorFormInput']);
        //check isset all language or name language
        else if(isset($_POST['choices'])){
            foreach (is_array($_POST['choices'])?array(...$_POST['choices'], $_GET['lang']=>$_GET['lang']):$this->getModel2()['AllNamesLanguage'] as $key => $value)
                if(is_array($_POST['choices']) && !isset($this->getModel2()['AllNamesLanguage'][$key]))
                    $this->showError($this->getModelPage()['ErrorFormInput']);
                else  
                    $this->saveWord($key);
        }
        else
            $this->saveWord($_GET['lang']);
        $this->saveModel($this->file);
        $this->showMessage($this->getModelPage()['AllLanguageEdit']);
    }
    function saveWord($myKeyWord){
        if(isset($_GET['array']))
            $this->file[$myKeyWord][$_GET['table']][$_GET['key']][$_GET['array']] = $_POST['word'];
        else
            $this->file[$myKeyWord][$_GET['table']][$_GET['key']] = $_POST['word'];
    }
}
new SystemLangEditPost();
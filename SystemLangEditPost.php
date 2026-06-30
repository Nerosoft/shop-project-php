<?php
include 'auth/SessionPost.php';
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
        $this->initErrorSystemlang();
        if(!isset($_POST['word']) || $_POST['word'] === '')
            $this->showError($this->getTextRequired());
        else if(strlen($_POST['word']) < 3 )
            $this->showError($this->getTextLenght());
        else if(!isset($_GET['lang']) || !isset($_GET['table']) || !isset($_GET['key']) || !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']]) && !isset($_GET['array']) || isset($_GET['array']) && !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']]))
            $this->showError($this->getModelPage()['ErrorFormInput']);
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
        $this->showMessage($this->getModelPage()['AllLanguageEdit']);
    }
}
new SystemLangEditPost();
<?php
include 'auth/SessionAdmin.php';
class SystemLangEditPost extends ModelJson{
    use ErrorSystemlang;
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
        else if(isset($_POST['choices'])){
            $file = $this->getObj();
            foreach (is_array($_POST['choices'])?array(...$_POST['choices'], $_GET['lang']=>$_GET['lang']):$this->getModel2()['AllNamesLanguage'] as $key => $value)
                if(is_array($_POST['choices']) && !isset($this->getModel2()['AllNamesLanguage'][$key]))
                    $this->showError($this->getModelPage()['ErrorFormInput']);
                else if(isset($_GET['array']))
                    $file[$key][$_GET['table']][$_GET['key']][$_GET['array']] = $_POST['word'];
                else
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
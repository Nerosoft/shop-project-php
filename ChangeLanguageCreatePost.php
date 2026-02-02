<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'MessageError.php';
class ChangeLanguageCreatePost extends MessageError{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->initErrorChangelanguage($this->getModel2());
        $this->validChangeLanguage($this);
        if($this->isEmptyErrors()){
            $newKey = $this->getRandomId();
            $myData = $this->getObj();
            $this->saveLanguageDatabase($newKey, $myData, $this);
            $myData[$newKey] = $myData['MyLanguage'];
            $myData[$newKey]['AllNamesLanguage'] = $myData[$this->getLanguage()]['AllNamesLanguage'];
            if(isset($myData[$this->getLanguage()]['MyFlexTables']))
                foreach ($myData[$this->getLanguage()]['MyFlexTables'] as $key => $value){ 
                    $myData[$newKey]['MyFlexTables'][$key] = $value;
                    $myData[$newKey][$key] = $myData[$this->getLanguage()][$key];   
                }  
            $this->saveModel($myData);
            $view = new MyChangeLanguage('MessageModelCreate');
        }else{
            $view = new MyChangeLanguage();
            $this->displayErrors();
        }
        include 'ChangeLanguage_view.php';
    }
}

new ChangeLanguageCreatePost();
}else
    header('LOCATION:ChangeLanguage');
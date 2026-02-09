<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
class ChangeLanguageCreatePost extends ModelJson{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $newKey = $this->getRandomId();
        $myData = $this->initErrorChangelanguage2($this->getMyModal(),  $newKey);
        $myData[$newKey] = $myData['MyLanguage'];
        $myData[$newKey]['AllNamesLanguage'] = $myData[$this->getLanguage()]['AllNamesLanguage'];
        if(isset($myData[$this->getLanguage()]['MyFlexTables']))
            foreach ($myData[$this->getLanguage()]['MyFlexTables'] as $key => $value){ 
                $myData[$newKey]['MyFlexTables'][$key] = $value;
                $myData[$newKey][$key] = $myData[$this->getLanguage()][$key];   
            }  
        $this->saveModel($myData);
        MyChangeLanguage::initMyChangeLanguage('MessageModelCreate');
    }
}

new ChangeLanguageCreatePost();
}else
    header('LOCATION:view?id=ChangeLanguage');
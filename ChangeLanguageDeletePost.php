<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('ChangeLanguage', 'Delete', 'success', function(){
class ChangeLanguageDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('ChangeLanguage', function($myFile){
            return $this->deleteLanguage($myFile);
        }, 'Delete');
        $this->saveModel($this->deleteLanguage($this->getObj()));
    }
    function deleteLanguage($myData){
        //delete language
        unset($myData[$_POST['id']]);
        //check if branch active language
        if($myData['Setting']['Language'] === $_POST['id'])
            $myData['Setting']['Language'] = 'english';
        foreach ($myData[$myData['Setting']['Language']]['AllNamesLanguage'] as $key=>$value)
            //delete name language inside AllNamesLanguage inside my language
            if($key !== $_POST['id'])
                unset($myData[$key]['AllNamesLanguage'][$_POST['id']]);
        return $myData;
    }
}
new ChangeLanguageDeletePost();
});
}else
    header('LOCATION:view?id=ChangeLanguage');
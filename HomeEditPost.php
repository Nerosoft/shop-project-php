<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('Home', 'MessageModelEdit', 'success', function(){
class HomeEditPost extends ValidationId{
    use ErrorsHome;
    function __construct(){
        parent::__construct('Home', function ($myFile){
            return $this->editHome($myFile, $myFile[$myFile['Setting']['Language']]['AllNamesLanguage']);
        }, 'MessageModelEdit'); 
        $this->saveModel($this->editHome($this->getObj(), $this->getModel2()['AllNamesLanguage']));
    }
    function editHome($myData, $AllNamesLanguage){
        foreach ($AllNamesLanguage as $code => $value) 
            $myData[$code]['MyFlexTables'][$this->keyId] = $_POST['name'];
        return $myData;
    }
}
new HomeEditPost();
});
}else
    header('LOCATION:index');
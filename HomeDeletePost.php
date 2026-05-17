<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
ModelJson::initView('Home', 'Delete', 'success', function(){
class HomeDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Home', function($myFile, $idSseion){
            return $this->deleteHome($myFile, $idSseion);
        }, 'Delete'); 
        $this->saveModel($this->deleteHome($this->getObj(), $this->getId()));
    }
    function deleteHome($myData, $idSseion){
        foreach ($myData[$myData['Setting']['Language']]['AllNamesLanguage'] as $key => $value) 
            if(count($myData[$key]['MyFlexTables']) === 1)
                unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables']);
            else
                unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables'][$_POST['id']]);
        if(isset($myData[$_POST['id']])){
            foreach ($myData[$_POST['id']] as $key => $value)
                array_map('unlink', glob('asset/product/'.$idSseion.'/'.$key.'.*'));
            unset($myData[$_POST['id']]);
        }
        return $myData;
    }
}
new HomeDeletePost();
});
}else
    header('LOCATION:index');
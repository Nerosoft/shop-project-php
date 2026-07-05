<?php
include 'auth/SessionPost.php';
class HomeDeletePost extends ValidationId{
    function __construct(){
        parent::__construct(function($myFile, $idSseion){
            return $this->deleteHome($myFile, $idSseion);
        }, 'Delete'); 
        $this->saveModel($this->deleteHome($this->getObj(), $this->getId()));
        $this->showMessage($this->getModelPage()['Delete']);
    }
    function deleteHome($myData, $idSseion){
        foreach ($myData[$myData['Setting']['AllNamesLanguage']]['AllNamesLanguage'] as $key => $value) 
            if(count($myData[$key]['MyFlexTables']) === 1)
                unset($myData[$key][$this->keyId], $myData[$key]['MyFlexTables']);
            else
                unset($myData[$key][$this->keyId], $myData[$key]['MyFlexTables'][$this->keyId]);
        if(isset($myData[$this->keyId])){
            foreach ($myData[$this->keyId] as $key => $value)
                array_map('unlink', glob('asset/product/'.$idSseion.'/'.$key.'.*'));
            unset($myData[$this->keyId]);
        }
        return $myData;
    }
}
new HomeDeletePost();
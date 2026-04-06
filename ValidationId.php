<?php
class ValidationId{
    //passing modal and stop extends
    //make pram for allnamelanguage and style $modal->getSCRIPTFILENAME() === 'ChangeLanguageEditPost'?'AllNamesLanguage':'Style'
    function __construct($modal, $callback = null, $keyId = null, $keysInput = null){
        //valid id first
        if($modal->getSCRIPTFILENAME()!=='FlexTablesCreatePost' && $modal->getSCRIPTFILENAME()!=='HomeCreatePost' && $modal->getSCRIPTFILENAME()!=='ChangeLanguageCreatePost' && $modal->getSCRIPTFILENAME()!=='SettingUsersCreatePost' && $modal->getSCRIPTFILENAME()!=='ProductCreatePost' && !isset($_POST['id']) ||
         $modal->getSCRIPTFILENAME()!=='FlexTablesCreatePost' && $modal->getSCRIPTFILENAME()!=='HomeCreatePost' && $modal->getSCRIPTFILENAME()!=='ChangeLanguageCreatePost' &&  $modal->getSCRIPTFILENAME()!=='SettingUsersCreatePost' && $modal->getSCRIPTFILENAME()!=='ProductCreatePost' && $_POST['id'] === '')
            $modal->initViewPost($modal->getModelPage()['IdIsReq']);
        
        
        
        
        
        //make valid is array and count branch
        //make test id session inside array choices
        else if(isset($_POST['choices']) && is_array($_POST['choices']) && isset($_POST['choices'][$modal->getId()])|| 
            isset($_POST['choices']) && !is_array($_POST['choices']) ||
            isset($_POST['choices']) && count($modal->getFileByFixedId()['Branches']) === 1||
            isset($_POST['Branches']) && count($modal->getFileByFixedId()['Branches']) === 1)
            $modal->initViewPost($modal->getModel2()['AppSettingAdmin']['BranchInv']);






        //make add edit delete for home and language and users and product inside all branch
        else if(isset($_POST['Branches']) && $modal->getUrlName2() === 'Users'||
            isset($_POST['choices']) && $modal->getUrlName2() === 'Users'||
            isset($_POST['Branches']) && $modal->getUrlName2() === 'Home'||
            isset($_POST['choices']) && $modal->getUrlName2() === 'Home'||
            isset($_POST['Branches']) && $modal->getSCRIPTFILENAME() === 'FlexTablesCreatePost'||
            isset($_POST['choices']) && $modal->getSCRIPTFILENAME() === 'FlexTablesCreatePost'||
            isset($_POST['Branches']) && $modal->getSCRIPTFILENAME() === 'FlexTablesDeletePost'||
            isset($_POST['choices']) && $modal->getSCRIPTFILENAME() === 'FlexTablesDeletePost'||
            isset($_POST['Branches']) && $modal->getUrlName2() === 'MyStyle'||
            isset($_POST['choices']) && $modal->getUrlName2() === 'MyStyle'||
            isset($_POST['Branches']) && $modal->getUrlName2() === 'ChangeLanguage'||
            isset($_POST['choices']) && $modal->getUrlName2() === 'ChangeLanguage'||
            isset($_POST['Branches']) && $modal->getUrlName2() === 'Product'||
            isset($_POST['choices']) && $modal->getUrlName2() === 'Product'){
            //make declar file if delete item and test id
            $myFile = $modal->getFile();
            foreach (isset($_POST['Branches']) ? $modal->getFileByFixedId()['Branches'] : array(...$_POST['choices'], $modal->getId()=>$modal->getId()) as $key => $value)
                //make test id branch if user select choices option
                if(!isset($_POST['Branches']) && !isset($modal->getBranch()[$key]))
                    $modal->initViewPost($modal->getModel2()['AppSettingAdmin']['BranchInv']);
                //make text id inside all branch for users and product and home and language (only edit)
                //use $IdPage only(users and product)
                //style dont create use getUrlName2
                else if(isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'FlexTablesCreatePost' && !isset($myFile[$key][$_GET['id']][$_POST['id']]) ||
                    !isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'FlexTablesCreatePost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$_GET['id']]) ||
                    isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'FlexTablesDeletePost' && !isset($myFile[$key][$_GET['id']][$_POST['id']]) ||
                    
                    $modal->getSCRIPTFILENAME() === 'ChangeLanguageEditPost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$_POST['option'] === 'MyStyle'?'Style':'AllNamesLanguage'][$_POST['id']]) ||
                    $modal->getSCRIPTFILENAME() === 'ChangeLanguagePost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$_POST['option'] === 'MyStyle'?'Style':'AllNamesLanguage'][$_POST['id']]) ||
                    $modal->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost' && !isset($myFile[$key][$_POST['id']]) ||
                    $modal->getSCRIPTFILENAME() === 'HomeEditPost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$_POST['id']]) ||
                    $modal->getSCRIPTFILENAME() === 'HomeDeletePost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$_POST['id']]) ||
                  
                $modal->getSCRIPTFILENAME() === 'ProductDeletePost' && !isset($myFile[$key][$modal->getUrlName2()][$_POST['id']])||
                  $modal->getSCRIPTFILENAME() === 'SettingUsersDeletePost' && !isset($myFile[$key][$modal->getUrlName2()][$_POST['id']]) ||
                  //ignore create validation account and product
                  isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'ProductCreatePost' && !isset($myFile[$key][$modal->getUrlName2()][$_POST['id']])||
                  isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'SettingUsersCreatePost' && !isset($myFile[$key][$modal->getUrlName2()][$_POST['id']]))
                    $modal->initViewPost($modal->getModelPage()['IdIsInv']);
                    //make delete user
                else if($modal->getSCRIPTFILENAME() === 'SettingUsersDeletePost' || $modal->getSCRIPTFILENAME() === 'FlexTablesDeletePost')
                    //delete item or array
                    $myFile[$key] = $this->deleteItem($modal->getSCRIPTFILENAME() === 'FlexTablesDeletePost'?$_GET['id']:$modal->getUrlName2(), $myFile[$key]);
                else
                    $myFile[$key] = $callback($myFile[$key], $key);
            $modal->saveFile($myFile);
        }


        else if(
            $modal->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $modal->getFixedId()||
            $modal->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $modal->getId()||
            $modal->getUrlName2() === 'Branches' && !isset($modal->getBranch()[$_POST['id']])||
            $modal->getUrlName2() === 'MyStyle' && !isset($modal->getModel2()['Style'][$_POST['id']])||
            $modal->getSCRIPTFILENAME() === 'FlexTablesCreatePost' && !isset($modal->getObj()[$_GET['id']][$_POST['id']]) ||
            $modal->getSCRIPTFILENAME() === 'FlexTablesDeletePost' && !isset($modal->getObj()[$_GET['id']][$_POST['id']]) ||
            $modal->getUrlName2() === 'Login' && $_POST['state'] ==='lang' && !isset($modal->getModel2()['AllNamesLanguage'][$_POST['id']])||
            $modal->getUrlName2() === 'Register' && $_POST['state'] ==='lang' && !isset($modal->getModel2()['AllNamesLanguage'][$_POST['id']])||
            $modal->getUrlName2() === 'Login' && $_POST['state'] ==='style' && !isset($modal->getModel2()['Style'][$_POST['id']])||
            $modal->getUrlName2() === 'Register' && $_POST['state'] ==='style' && !isset($modal->getModel2()['Style'][$_POST['id']])||
            //work delete add edit user and product and home and change language
            $modal->getUrlName2() === 'Users' && !isset($modal->getObj()['Users'][$_POST['id']])||
            $modal->getUrlName2() === 'Home' && !isset($modal->getModel2()['MyFlexTables'][$_POST['id']])||
            $modal->getUrlName2() === 'ChangeLanguage' && !isset($modal->getModel2()['AllNamesLanguage'][$_POST['id']])||
            $modal->getUrlName2() === 'Product' && !isset($modal->getObj()['Product'][$_POST['id']])||
            //check lang name = english (system) and = (select language)
            $modal->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === $modal->getLanguage() && $modal->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'||
            $modal->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === 'english' && $modal->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'
        )
            $modal->initViewPost($modal->getModelPage()['IdIsInv']);
    }
    function deleteItem($id, $myData){
        if(count($myData[$id]) === 1)
            unset($myData[$id]);
        else
            unset($myData[$id][$_POST['id']]);
        return $myData;
    }
}

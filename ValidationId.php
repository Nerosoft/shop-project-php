<?php
class ValidationId extends ModelJson{
    function deleteHome($myData){
        foreach ($myData[$myData['Setting']['Language']]['AllNamesLanguage'] as $key => $value) 
            if(count($myData[$key]['MyFlexTables']) === 1)
                unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables']);
            else
                unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables'][$_POST['id']]);
        if(isset($myData[$_POST['id']]))
            unset($myData[$_POST['id']]);
        return $myData;
    }
    function deleteLanguage($myData){
        //delete language
        unset($myData[$_POST['id']]);
        foreach ($myData[$myData['Setting']['Language']]['AllNamesLanguage'] as $key=>$value)
            //delete name language inside AllNamesLanguage inside my language
            if($key !== $_POST['id'])
                unset($myData[$key]['AllNamesLanguage'][$_POST['id']]);
        return $myData;
    }
    function __construct($IdPage){
        parent::__construct($IdPage);
        //valid id first
        if($this->getSCRIPTFILENAME()!=='HomeCreatePost' && $this->getSCRIPTFILENAME()!=='ChangeLanguageCreatePost' && $this->getSCRIPTFILENAME()!=='SettingUsersCreatePost' && $this->getSCRIPTFILENAME()!=='ProductCreatePost' && !isset($_POST['id']) || $this->getSCRIPTFILENAME()!=='HomeCreatePost' && $this->getSCRIPTFILENAME()!=='ChangeLanguageCreatePost' &&  $this->getSCRIPTFILENAME()!=='SettingUsersCreatePost' && $this->getSCRIPTFILENAME()!=='ProductCreatePost' && $_POST['id'] === '')
            $this->initViewPost($this->getModelPage()['IdIsReq']);
        //make valid is array and count branch
        //make test id session inside array choices
        else if(isset($_POST['choices']) && is_array($_POST['choices']) && isset($_POST['choices'][$this->getId()])|| 
            isset($_POST['choices']) && !is_array($_POST['choices']) ||
            isset($_POST['choices']) && count($this->getFileByFixedId()['Branches']) === 1||
            isset($_POST['Branches']) && count($this->getFileByFixedId()['Branches']) === 1)
            $this->initViewPost($this->getModel2()['AppSettingAdmin']['BranchInv']);
        //make add edit delete for home and language and users and product inside all branch
        else if(isset($_POST['Branches']) && $this->getUrlName2() === 'Users'||
            isset($_POST['choices']) && $this->getUrlName2() === 'Users'||
            isset($_POST['Branches']) && $this->getUrlName2() === 'Home'||
            isset($_POST['choices']) && $this->getUrlName2() === 'Home'||
            isset($_POST['Branches']) && $this->getUrlName2() === 'ChangeLanguage'||
            isset($_POST['choices']) && $this->getUrlName2() === 'ChangeLanguage'||
            isset($_POST['Branches']) && $this->getUrlName2() === 'Product'||
            isset($_POST['choices']) && $this->getUrlName2() === 'Product'){
                
            //make declar file if delete item and test id
            $myFile = $this->getFile();
            //add id if user select choices
            if(isset($_POST['choices']))
                $_POST['choices'][$this->getId()] = $this->getId();
            foreach (isset($_POST['Branches']) ? $this->getFileByFixedId()['Branches'] : $_POST['choices'] as $key => $value)
                //make test id branch if user select choices option
                if(!isset($_POST['Branches']) && !isset($this->getBranch()[$key]))
                    $this->initViewPost($this->getModel2()['AppSettingAdmin']['BranchInv']);
                //make text id inside all branch for users and product and home and language (only edit)
                //use $IdPage only(users and product)
                else if($this->getSCRIPTFILENAME() === 'ChangeLanguageEditPost' && !isset($myFile[$key][$_POST['id']]) || $this->getSCRIPTFILENAME() === 'HomeEditPost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$_POST['id']]) || $this->getSCRIPTFILENAME() === 'SettingUsersEditPost' && !isset($myFile[$key][$IdPage][$_POST['id']]) || $this->getSCRIPTFILENAME() === 'ProductEditPost' && !isset($myFile[$key][$IdPage][$_POST['id']]))
                    $this->initViewPost($this->getModelPage()['IdIsInv']);
                //make delete home
                else if($this->getSCRIPTFILENAME() === 'HomeDeletePost')
                    //delete item or array
                   $myFile[$key] = $this->deleteHome($myFile[$key]);
                //make delete language
                else if($this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost')
                    //delete item or array
                   $myFile[$key] = $this->deleteLanguage($myFile[$key]);
                //make delete user
                else if($this->getSCRIPTFILENAME() === 'SettingUsersDeletePost')
                    //delete item or array
                    $myFile[$key] = $this->deleteItem($IdPage, $myFile[$key]);
                //make delete product
                else if($this->getSCRIPTFILENAME() === 'ProductDeletePost'){
                    //delete item or array
                    $myFile[$key] = $this->deleteItem($IdPage, $myFile[$key]);
                    //delete image for product
                    array_map('unlink', glob('asset/product/'.$key.'/'.$_POST['id'].'.*'));
                }
            //make save file and return message successfully delete only(product and users)
            if($this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost' || $this->getSCRIPTFILENAME() === 'HomeDeletePost' || $this->getSCRIPTFILENAME() === 'ProductDeletePost' || $this->getSCRIPTFILENAME() === 'SettingUsersDeletePost'){
                $this->saveFile($myFile);
                $this->initViewPost('Delete', 'success');
            }
        }
        else if($this->getSCRIPTFILENAME() === 'HomeCreatePost'||
            $this->getSCRIPTFILENAME() === 'ChangeLanguageCreatePost' ||
            $this->getSCRIPTFILENAME() === 'SettingUsersCreatePost' ||
            $this->getSCRIPTFILENAME() === 'ProductCreatePost')
            return;
        else if(
            $this->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $this->getFixedId()||
            $this->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $this->getId()||
            $this->getUrlName2() === 'Branches' && !isset($this->getBranch()[$_POST['id']])||
            $this->getUrlName2() === 'MyStyle' && !isset($this->getModel2()['Style'][$_POST['id']])||
            $this->getSCRIPTFILENAME() === 'FlexTablesEditPost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
            $this->getSCRIPTFILENAME() === 'FlexTablesDeletePost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
            $this->getUrlName2() === 'Login' && $_POST['state'] ==='lang' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
            $this->getUrlName2() === 'Register' && $_POST['state'] ==='lang' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
            $this->getUrlName2() === 'Login' && $_POST['state'] ==='style' && !isset($this->getModel2()['Style'][$_POST['id']])||
            $this->getUrlName2() === 'Register' && $_POST['state'] ==='style' && !isset($this->getModel2()['Style'][$_POST['id']])||
            //work delete add edit user and product and home and change language
            $this->getUrlName2() === 'Users' && !isset($this->getObj()['Users'][$_POST['id']])||
            $this->getUrlName2() === 'Home' && !isset($this->getModel2()['MyFlexTables'][$_POST['id']])||
            $this->getUrlName2() === 'ChangeLanguage' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
            $this->getUrlName2() === 'Product' && !isset($this->getObj()['Product'][$_POST['id']])||
            //check lang name = english (system) and = (select language)
            $this->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === $this->getLanguage() && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'||
            $this->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === 'english' && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'
        )
            $this->initViewPost($this->getModelPage()['IdIsInv']);
    }
    function deleteItem($id, $myData){
        if(count($myData[$id]) === 1)
            unset($myData[$id]);
        else
            unset($myData[$id][$_POST['id']]);
        return $myData;
    }
}

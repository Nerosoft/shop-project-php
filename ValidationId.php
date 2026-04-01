<?php
class ValidationId{
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
    function changeLangStylePost($myData, $myKey){
        $myData['Setting'][$myKey] = $_POST['id'];
        return $myData;
    }
    function saveFelxTable($AllNamesLanguage, $myData, $key, $modal){
        foreach ($AllNamesLanguage as $code => $value) {
            $myData[$code]['MyFlexTables'][$key] = $_POST['name'];
            $myData[$code][$key] = $myData[$code]['TablePage'];
            $myData[$code][$key]['MYTITLE'] = $_POST['name'];
            for ($i=0; $i < $_POST['input_number']; $i++){
                $myInputKey = $modal->getRandomId();
                $myData[$code][$key]['TableHead'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputNameTable'];
                $myData[$code][$key]['Label'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputLabel'];
                $myData[$code][$key]['Hint'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputHint'];
                $myData[$code][$key]['ErrorsMessageReq'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageReq'];
                $myData[$code][$key]['ErrorsMessageInv'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageInv'];
            }
        }
        return $myData;
    }
    function editHome($myData, $AllNamesLanguage){
        foreach ($AllNamesLanguage as $code => $value) 
            $myData[$code]['MyFlexTables'][$_POST['id']] = $_POST['name'];
        return $myData;
    }
    //passing modal and stop extends
    //make pram for allnamelanguage and style $modal->getSCRIPTFILENAME() === 'ChangeLanguageEditPost'?'AllNamesLanguage':'Style'
    function __construct($modal, $keyId = null, $var = null){
        //valid id first
        if($modal->getSCRIPTFILENAME()!=='HomeCreatePost' && $modal->getSCRIPTFILENAME()!=='ChangeLanguageCreatePost' && $modal->getSCRIPTFILENAME()!=='SettingUsersCreatePost' && $modal->getSCRIPTFILENAME()!=='ProductCreatePost' && !isset($_POST['id']) || $modal->getSCRIPTFILENAME()!=='HomeCreatePost' && $modal->getSCRIPTFILENAME()!=='ChangeLanguageCreatePost' &&  $modal->getSCRIPTFILENAME()!=='SettingUsersCreatePost' && $modal->getSCRIPTFILENAME()!=='ProductCreatePost' && $_POST['id'] === '')
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
                else if($modal->getSCRIPTFILENAME() === 'ChangeLanguageEditPost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$keyId][$_POST['id']]) ||
                $modal->getSCRIPTFILENAME() === 'ChangeLanguagePost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$keyId][$_POST['id']]) ||
                  $modal->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost' && !isset($myFile[$key][$_POST['id']]) ||
                   $modal->getSCRIPTFILENAME() === 'HomeEditPost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$_POST['id']]) ||
                   $modal->getSCRIPTFILENAME() === 'HomeDeletePost' && !isset($myFile[$key][$myFile[$key]['Setting']['Language']][$_POST['id']]) ||
                    isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'SettingUsersCreatePost' && !isset($myFile[$key][$modal->getUrlName2()][$_POST['id']]) ||
                    $modal->getSCRIPTFILENAME() === 'SettingUsersDeletePost' && !isset($myFile[$key][$modal->getUrlName2()][$_POST['id']]) ||
                    isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'ProductCreatePost' && !isset($myFile[$key][$modal->getUrlName2()][$_POST['id']])||
                    $modal->getSCRIPTFILENAME() === 'ProductDeletePost' && !isset($myFile[$key][$modal->getUrlName2()][$_POST['id']]))
                    $modal->initViewPost($modal->getModelPage()['IdIsInv']);
                //-------------------------------------------------------------------------------
                //make create account and check exist account (only create account)
                //make edit account and email inside post = exist email (only edit account)
                else if($modal->getSCRIPTFILENAME() === 'SettingUsersCreatePost' && isset($myFile[$key]['Users']) && in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $myFile[$key]['Users'])) || isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'SettingUsersCreatePost' && isset($myFile[$key]['Users'][$_POST['id']]) && $myFile[$key]['Users'][$_POST['id']]['Email'] !== $_POST['Email'] && in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $myFile[$key]['Users'])))
                    $modal->initViewPost($modal->getModelPage()['EmailExist']);
                else if($modal->getSCRIPTFILENAME() === 'SettingUsersCreatePost')
                    $myFile[$key]['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                //make delete user
                else if($modal->getSCRIPTFILENAME() === 'SettingUsersDeletePost')
                    //delete item or array
                    $myFile[$key] = $this->deleteItem($modal->getUrlName2(), $myFile[$key]);
                //--------------------------------------------------------------------------------
                else if($modal->getSCRIPTFILENAME() === 'ChangeLanguageCreatePost'){
                    $myFile[$key] = $this->saveNameLanguage($myFile[$key][$myFile[$key]['Setting']['Language']]['AllNamesLanguage'], 'AllNamesLanguage', $keyId, $myFile[$key]);
                    $lang = $modal->getObj()['english'];
                    //reset all name language 
                    $lang['AllNamesLanguage'] = $myFile[$key][$myFile[$key]['Setting']['Language']]['AllNamesLanguage'];
                    //chick if exist flex table and delete
                    if(isset($lang['MyFlexTables']))
                        foreach ($lang['MyFlexTables'] as $keyFlexTable => $value)
                            unset($lang[$keyFlexTable]);
                    //check if exist flex table inside branch
                    if(isset($myFile[$key][$myFile[$key]['Setting']['Language']]['MyFlexTables'])){
                        $lang['MyFlexTables'] = $myFile[$key][$myFile[$key]['Setting']['Language']]['MyFlexTables'];
                        foreach ($lang['MyFlexTables'] as $keyFlex => $value)
                            $lang[$keyFlex] = $myFile[$key][$myFile[$key]['Setting']['Language']][$keyFlex];
                    }
                    //add lang inside branch
                    $myFile[$key][$keyId] = $lang;
                }
                else if($modal->getSCRIPTFILENAME() === 'ChangeLanguageEditPost')
                    $myFile[$key] = $this->saveNameLanguage($myFile[$key][$myFile[$key]['Setting']['Language']]['AllNamesLanguage'], $var, $_POST['id'], $myFile[$key]);
                //make delete language
                else if($modal->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost')
                    //delete item or array
                   $myFile[$key] = $this->deleteLanguage($myFile[$key]);
                else if($modal->getSCRIPTFILENAME() === 'ChangeLanguagePost')
                    $myFile[$key] = $this->changeLangStylePost($myFile[$key], $var);
                //--------------------------------------------------------------------------------
                else if($modal->getSCRIPTFILENAME() === 'HomeCreatePost')
                    $myFile[$key] = $this->saveFelxTable($myFile[$key][$myFile[$key]['Setting']['Language']]['AllNamesLanguage'], $myFile[$key], $keyId, $modal);
                else if($modal->getSCRIPTFILENAME() === 'HomeEditPost')
                    $myFile[$key] = $this->editHome($myFile[$key], $myFile[$key][$myFile[$key]['Setting']['Language']]['AllNamesLanguage']);
                //make delete home
                else if($modal->getSCRIPTFILENAME() === 'HomeDeletePost')
                    //delete item or array
                   $myFile[$key] = $this->deleteHome($myFile[$key]);
                //--------------------------------------------------------------------------------
                else if($modal->getSCRIPTFILENAME() === 'ProductCreatePost')
                    $myFile[$key] = $this->saveProduct($myFile[$key], $keyId, $key);
                //make delete product
                else if($modal->getSCRIPTFILENAME() === 'ProductDeletePost'){
                    //delete item or array
                    $myFile[$key] = $this->deleteItem($modal->getUrlName2(), $myFile[$key]);
                    //delete image for product
                    array_map('unlink', glob('asset/product/'.$key.'/'.$_POST['id'].'.*'));
                }
                //---------------------------------------------------------------------------------
            $modal->saveFile($myFile);
        }


        else if(
            isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $modal->getFixedId()||
            isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $modal->getId()||
            isset($_POST['id']) && $modal->getUrlName2() === 'Branches' && !isset($modal->getBranch()[$_POST['id']])||
            isset($_POST['id']) && $modal->getUrlName2() === 'MyStyle' && !isset($modal->getModel2()['Style'][$_POST['id']])||
            isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'FlexTablesEditPost' && !isset($modal->getObj()[$_GET['id']][$_POST['id']]) ||
            isset($_POST['id']) && $modal->getSCRIPTFILENAME() === 'FlexTablesDeletePost' && !isset($modal->getObj()[$_GET['id']][$_POST['id']]) ||
            isset($_POST['id']) && $modal->getUrlName2() === 'Login' && $_POST['state'] ==='lang' && !isset($modal->getModel2()['AllNamesLanguage'][$_POST['id']])||
            isset($_POST['id']) && $modal->getUrlName2() === 'Register' && $_POST['state'] ==='lang' && !isset($modal->getModel2()['AllNamesLanguage'][$_POST['id']])||
            isset($_POST['id']) && $modal->getUrlName2() === 'Login' && $_POST['state'] ==='style' && !isset($modal->getModel2()['Style'][$_POST['id']])||
            isset($_POST['id']) && $modal->getUrlName2() === 'Register' && $_POST['state'] ==='style' && !isset($modal->getModel2()['Style'][$_POST['id']])||
            //work delete add edit user and product and home and change language
            isset($_POST['id']) && $modal->getUrlName2() === 'Users' && !isset($modal->getObj()['Users'][$_POST['id']])||
            isset($_POST['id']) && $modal->getUrlName2() === 'Home' && !isset($modal->getModel2()['MyFlexTables'][$_POST['id']])||
            isset($_POST['id']) && $modal->getUrlName2() === 'ChangeLanguage' && !isset($modal->getModel2()['AllNamesLanguage'][$_POST['id']])||
            isset($_POST['id']) && $modal->getUrlName2() === 'Product' && !isset($modal->getObj()['Product'][$_POST['id']])||
            //check lang name = english (system) and = (select language)
            isset($_POST['id']) && $modal->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === $modal->getLanguage() && $modal->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'||
            isset($_POST['id']) && $modal->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === 'english' && $modal->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'
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

<?php
class ValidationId extends ModelJson{
    function validUsersProduct($id){
        //add key session id inside option array
        $_POST['choices'][$this->getId()] = $this->getId();
        $myData = $this->getFile();
        foreach ($_POST['choices'] as $keyBranch => $value){
            //check branch key and id and delete item or array
            if(isset($myData[$keyBranch][$id][$_POST['id']]) && count($myData[$keyBranch][$id]) === 1)
                unset($myData[$keyBranch][$id]);
            else if(isset($this->getFile()[$keyBranch][$id][$_POST['id']]))
                unset($myData[$keyBranch][$id][$_POST['id']]);
            //return true if error branch and id 
            else 
                return true;
            if($id === 'Product')
                array_map('unlink', glob('asset/product/'.$keyBranch.'/'.$_POST['id'].'.*'));
        }
        //save file
        $this->saveFile($myData);
        //show view and message delete
        $this->initViewPost('Delete', 'success');
    }
    function validUsersEdit(){
        //add key session id inside option array
        $_POST['choices'][$this->getId()] = $this->getId();
        $file = $this->getFile();
        foreach ($_POST['choices'] as $keyBranch => $value){
            //check branch key and id and delete item or array
            if(isset($file[$keyBranch]['Users'][$_POST['id']]) && !in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $file[$keyBranch]['Users'])) || isset($file[$keyBranch]['Users'][$_POST['id']]) && $_POST['Email'] === $file[$keyBranch]['Users'][$_POST['id']]['Email'])
                $file[$keyBranch]['Users'][$_POST['id']] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
            else if($file[$keyBranch]['Users'][$_POST['id']] && in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $file[$keyBranch]['Users'])))
                MySettingUsers::initMySettingUsers('EmailExist', 'danger');
            else 
                return true;
        }
        //save file
        $this->saveFile($file);
        //show view and message edit
        MySettingUsers::initMySettingUsers('MessageModelEdit');
    }
    function validProductEdit(){
        //add key session id inside option array
        $_POST['choices'][$this->getId()] = $this->getId();
        $file = $this->getFile();
        foreach ($_POST['choices'] as $keyBranch => $value){
            //check branch key and id and delete item or array
            if(isset($file[$keyBranch]['Product'][$_POST['id']]))
                $file[$keyBranch] = $this->saveProduct($file[$keyBranch], $_POST['id'], $keyBranch);
            else 
                return true;
        }
        //save file
        $this->saveFile($file);
        //show view and message edit
        Product::initProduct('MessageModelEdit');
    }
    //check error and delete at same time
    function ValidLanguage($state = true, $message = 'Delete'){
        //add key session id inside option array
        $_POST['choices'][$this->getId()] = $this->getId();
        $file = $this->getFile();
        foreach ($_POST['choices'] as $keyBranch => $value){
            if(isset($file[$keyBranch][$_POST['id']]))
                $file[$keyBranch] = $state?$this->deleteLanguage($file[$keyBranch]):$this->saveNameLanguage($file[$keyBranch][$file[$keyBranch]['Setting']['Language']]['AllNamesLanguage'], 'AllNamesLanguage', $_POST['id'], $file[$keyBranch]);
            else 
                return true;
        }
        $this->saveFile($file);
        MyChangeLanguage::initMyChangeLanguage($message);
    }
    //valid delete and edit home
    function ValidHome($state = true, $message = 'Delete'){
        //add key session id inside option array
        $_POST['choices'][$this->getId()] = $this->getId();
        $file = $this->getFile();
        foreach ($_POST['choices'] as $keyBranch => $value){
            //check key branch first ([$file[$keyBranch]['Setting']['Language']]) and id
            if(isset($file[$keyBranch]) && isset($file[$keyBranch][$file[$keyBranch]['Setting']['Language']][$_POST['id']]))
                $file[$keyBranch] = $state?$this->deleteHome($file[$keyBranch]):$this->editHome($file[$keyBranch], $file[$keyBranch][$file[$keyBranch]['Setting']['Language']]['AllNamesLanguage']);
            else 
                return true;
        }
        $this->saveFile($file);
        MyHome::initHome($message);
    }
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
    function editHome($myData, $AllNamesLanguage){
        foreach ($AllNamesLanguage as $code => $value) 
            $myData[$code]['MyFlexTables'][$_POST['id']] = $_POST['name'];
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
        if(!isset($_POST['id']) || $_POST['id'] === '')
            $this->initViewPost($this->getModelPage()['IdIsReq']);
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
        //check file SettingUsersDeletePost and isset($_POST['choices']) firist work only delete and edit option user and product and home and change language
        isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'SettingUsersDeletePost' && $this->validUsersProduct('Users')||
        isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'SettingUsersEditPost' && $this->initErrorsEmailPassword3($this->getMyModal()) && $this->validKeyPassword($this->getMyModal()) && $this->validUsersEdit()||
        isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'ProductDeletePost' && $this->validUsersProduct('Product')||
        isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'ProductEditPost' && $this->validProductInput($this->getMyModal()) && $this->validProductEdit()||
        isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'HomeDeletePost' && $this->ValidHome()||
        isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'HomeEditPost' && $this->initErrorsHome2($this->getMyModal()) === 'valid' && $this->ValidHome(false, 'MessageModelEdit')||
        isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost' && $this->ValidLanguage()||
        isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageEditPost' && $this->validLanguageInput($this->getMyModal()) === 'valid' && $this->ValidLanguage(false, 'MessageModelEdit')||
        //work delete add edit user and product and home and change language
        $this->getUrlName2() === 'SettingUsers' && !isset($this->getObj()['Users'][$_POST['id']])||
        $this->getUrlName2() === 'Home' && !isset($this->getModel2()['MyFlexTables'][$_POST['id']])||
        $this->getUrlName2() === 'ChangeLanguage' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
        $this->getUrlName2() === 'Product' && !isset($this->getObj()['Product'][$_POST['id']])||
        //check lang name = english (system) and = (select language)
        $this->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === $this->getLanguage() && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'||
        $this->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === 'english' && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'
        )
            $this->initViewPost($this->getModelPage()['IdIsInv']);
    }
    function deleteItem($id){
        $myData = $this->getObj();
        if(count($myData[$id]) === 1)
            unset($myData[$id]);
        else
            unset($myData[$id][$_POST['id']]);
        $this->saveModel($myData);
    }
    function deleteItemUserProduct($id){
        $myData = $this->getFile();
        foreach ($_POST['choices'] as $keyBranch => $value)
            if(count($myData[$keyBranch][$id]) === 1)
                unset($myData[$keyBranch][$id]);
            else
                unset($myData[$keyBranch][$id][$_POST['id']]);
        $this->saveFile($myData);
    }
}

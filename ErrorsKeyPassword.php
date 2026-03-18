<?php
trait ErrorsKeyPassword{
    private $RequiredKeyPassword;
    private $InvalidKeyPassword;
    public function initErrorsKeyPassword($error){
        $this->RequiredKeyPassword = $error['RequiredKeyPassword'];
        $this->InvalidKeyPassword = $error['InvalidKeyPassword'];
    }
    function initErrorsKeyPassword2($modal, $keyId){
        $this->validKeyPassword($modal);
        if(isset($_POST['Branches']) && count($modal->getFileByFixedId()['Branches']) > 1 && $modal->getSCRIPTFILENAME() ==='SettingUsersCreatePost'|| isset($_POST['choices']) && is_array($_POST['choices']) && count($modal->getFileByFixedId()['Branches']) > 1 && $modal->getSCRIPTFILENAME() ==='SettingUsersCreatePost' || isset($_POST['choices']) && is_array($_POST['choices']) && count($modal->getFileByFixedId()['Branches']) > 1 && $modal->getSCRIPTFILENAME() ==='SettingUsersEditPost'){
            $file = $modal->getFile();
            foreach (isset($_POST['Branches']) ? $modal->getFileByFixedId()['Branches'] : array($modal->getId()=>$modal->getId(),...$_POST['choices']) as $keyBranch => $value)
                    //make edit account and email inside post = exist email
                if(isset($file[$keyBranch]['Users'][$keyId]) && $file[$keyBranch]['Users'][$keyId]['Email'] === $_POST['Email']||
                    //make create account and check exist account 
                    isset($file[$keyBranch]) && $modal->getSCRIPTFILENAME() ==='SettingUsersCreatePost' && isset($file[$keyBranch]['Users']) && !in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $file[$keyBranch]['Users']))||
                    //make create account and array user empty
                    isset($file[$keyBranch]) && $modal->getSCRIPTFILENAME() ==='SettingUsersCreatePost' && !isset($file[$keyBranch]['Users'])||
                    //make edit account and check exist email
                    isset($file[$keyBranch]['Users'][$keyId]) && !in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $file[$keyBranch]['Users'])))
                    //save account inside file
                    $file[$keyBranch]['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                //show error exist email
                else if(isset($file[$keyBranch]['Users']) && in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $file[$keyBranch]['Users'])))    
                    ModelJson::initViewPost($modal->getModelPage()['EmailExist']);
                //no return true validation when edit
                else
                    MySettingUsers::initMySettingUsers('IdIsInv', 'danger');
                //save file
            $modal->saveFile($file);
            //make edit account and email inside post = exist email
        }else if(isset($modal->getObj()['Users'][$keyId]['Email']) && $_POST['Email'] === $modal->getObj()['Users'][$keyId]['Email'] ||
        //make edit create account and check exist email
        isset($modal->getObj()['Users']) && !in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $modal->getObj()['Users']))||
        //check users empty
        !isset($modal->getObj()['Users'])){
            $myData = $modal->getObj();
            $myData['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
            $modal->saveModel($myData);
        //show message email exist
        }else
            ModelJson::initViewPost($modal->getModelPage()['EmailExist']);
        
    }
    function validKeyPassword($modal){
        $this->initErrorsKeyPassword($modal->getModelPage());
        if(!isset($_POST['Key']) || $_POST['Key'] === '')
            ModelJson::initViewPost($this->getRequiredKeyPassword(), 'danger');
        else if(strlen($_POST['Key']) < 8)
            ModelJson::initViewPost($this->getInvalidKeyPassword(), 'danger');
    }
    function createEditAccountBranch(){

    }
    function getRequiredKeyPassword(){
        return $this->RequiredKeyPassword;
    }
    function getInvalidKeyPassword(){
        return $this->InvalidKeyPassword;
    }
}
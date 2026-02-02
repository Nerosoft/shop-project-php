<?php

class MessageError extends ModelJson{
    private $Errors = array();
    function __construct($IdPage){
        parent::__construct($IdPage);
    }
    function setErrors($error){
        array_push($this->Errors, $error);
    }
    function getErrors(){
        return $this->Errors;
    }
    function isEmptyErrors(){
        return empty($this->Errors);
    }
    function getRandomId(){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2) . substr(uniqid(), -6);
    }
    function displayErrors(){
        $this->showCustomeMessage(function($type = 'danger'){
            foreach ($this->getErrors() as $key => $toast)
                include 'toast_message.php'; 
        }, '55px');
    }
    function validCustomTable($obj){
        if(!isset($_POST['name']) || $_POST['name'] === '')
            $this->setErrors($obj->getNameTableIsReq());
        else if(strlen($_POST['name']) < 3)
            $this->setErrors($obj->getNameTableIsInv());
    }
    function ValidBranch($obj){
        if(!isset($_POST['Name']) || $_POST['Name'] === '')
            $this->setErrors($obj->getBranceRaysNameRequired());
        else if(strlen($_POST['Name']) < 3)
            $this->setErrors($obj->getBranceRaysNameLength());
        if(!isset($_POST['Phone']) || $_POST['Phone'] === '')
            $this->setErrors($obj->getBranceRaysPhoneRequired());
        else if(!preg_match('/^[0-9]{11}$/', $_POST['Phone']))
            $this->setErrors($obj->getBranceRaysPhoneLength());
        if(!isset($_POST['Country']) || $_POST['Country'] === '')
            $this->setErrors($obj->getBranceRaysCountryRequired());
        else if(strlen($_POST['Country']) < 3)
            $this->setErrors($obj->getBranceRaysCountryLength());
        if(!isset($_POST['Governments']) || $_POST['Governments'] === '')
            $this->setErrors($obj->getBranceRaysGovernmentsRequired());
        else if(strlen($_POST['Governments']) < 3)
            $this->setErrors($obj->getBranceRaysGovernmentsLength());
        if(!isset($_POST['City']) || $_POST['City'] === '')
            $this->setErrors($obj->getBranceRaysCityRequired());
        else if(strlen($_POST['City']) < 3)
            $this->setErrors($obj->getBranceRaysCityLength());
        if(!isset($_POST['Street']) || $_POST['Street'] === '')
            $this->setErrors($obj->getBranceRaysStreetRequired());
        else if(strlen($_POST['Street']) < 3)
            $this->setErrors($obj->getBranceRaysStreetLength());
        if(!isset($_POST['Building']) || $_POST['Building'] === '')
            $this->setErrors($obj->getBranceRaysBuildingRequired());
        else if(strlen($_POST['Building']) < 3)
            $this->setErrors($obj->getBranceRaysBuildingLength());
        if(!isset($_POST['Address']) || $_POST['Address'] === '')
            $this->setErrors($obj->getBranceRaysAddressRequired());
        else if(strlen($_POST['Address']) < 3)
            $this->setErrors($obj->getBranceRaysAddressLength());
        if(!isset($_POST['Follow']) || $_POST['Follow'] === '')
            $this->setErrors($obj->getBranceRaysFollowRequired());
        else if(!isset($this->getModel2()['SelectBranchBox'][$_POST['Follow']]))
            $this->setErrors($this->getModelPage()['BranceRaysFollowValue']);
    }
    function validChangeLanguage($obj){
        if(!isset($_POST['lang_name']) || $_POST['lang_name'] === '')
            $this->setErrors($obj->getNewLangNameRequired());
        else if(strlen($_POST['lang_name']) < 3)
            $this->setErrors($obj->getNewLangNameInvalid());
    }
    function validFlexTable($obj){
        foreach ($this->getErrorsMessageReq() as $key => $value) {
            if(!isset($_POST[$key]) || $_POST[$key] === '')
                $this->setErrors($obj->getErrorsMessageReq()[$key]);
            else if(strlen($_POST[$key]) < 3)
                $this->setErrors($obj->getErrorsMessageInv()[$key]);
        }
    }
    function validUsers($obj){
        if(!isset($_POST['Email']) || $_POST['Email'] === '')
            $this->setErrors($obj->getRequiredEmail());
        else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
            $this->setErrors($obj->getInvalidEmail());
        else if(isset($this->getObj()['Users']) && in_array($_POST['Email'], array_map(function($obj) {return $obj['Email'];}, $this->getObj()['Users'])) && $this->getSCRIPTFILENAME() === 'SettingUsersCreatePost' ||
        isset($_POST['id']) && isset($this->getObj()['Users'][$_POST['id']]) && in_array($_POST['Email'], array_map(function($obj) {return $obj['Email'];}, $this->getObj()['Users'])) && $this->getObj()['Users'][$_POST['id']]['Email'] !== $_POST['Email'] && $this->getSCRIPTFILENAME() === 'SettingUsersEditPost' )
            $this->setErrors($this->getModelPage()['EmailExist']);
        if(!isset($_POST['Password']) || $_POST['Password'] === '')
            $this->setErrors($obj->getRequiredPassword());
        else if(strlen($_POST['Password']) < 8)
            $this->setErrors($obj->getInvalidPassword());
        if(!isset($_POST['Key']) || $_POST['Key'] === '')
            $this->setErrors($obj->getRequiredKeyPassword());
        else if(strlen($_POST['Key']) < 8)
            $this->setErrors($obj->getInvalidKeyPassword());
    }
    function validProduct($obj){
        if(!isset($_FILES['avatar'])){
            $this->setErrors($obj->getReqimage());
        }else if($this->getSCRIPTFILENAME()==="ProductCreatePost" && !is_uploaded_file($_FILES['avatar']['tmp_name'])){
            $this->setErrors($obj->getUploadImgInv());
        }else if(is_uploaded_file($_FILES['avatar']['tmp_name']) && 
        strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)) !== 'jpg' &&
        strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)) !== 'png'||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] > (2 * 1024 * 1024)||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] < 2000||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && !getimagesize($_FILES['avatar']['tmp_name'])){
            $this->setErrors($obj->getInvimage());
        }
        if(!isset($_POST['name']) || $_POST['name'] === '')
            $this->setErrors($obj->getRequiredName());
        else if(strlen($_POST['name']) < 3)
            $this->setErrors($obj->getInvalidName());
        if(!isset($_POST['descreption']) || $_POST['descreption'] === '')
            $this->setErrors($obj->getRequiredDescreption());
        else if(strlen($_POST['descreption']) < 8)
            $this->setErrors($obj->getInvalidDescreption());
        if(!isset($_POST['salary']) || $_POST['salary'] === '')
            $this->setErrors($obj->getRequiredSalary());
        else if(!is_numeric($_POST['salary']) || $_POST['salary'] > 1000000)
            $this->setErrors($obj->getInvalidSalary());
        if(!isset($_POST['category']) || $_POST['category'] === '')
            $this->setErrors($obj->getRequiredCategory());
        else if(strlen($_POST['category']) < 3)
            $this->setErrors($obj->getInvalidCategory());
    }
    function validStaticId(){
        if(!isset($_POST['superId']) || !isset($this->getFile()[$_POST['superId']]))
            $this->setErrors($this->getModelPage()['DbIdInv']);
    }
    function validStyleLang($obj){
        if(!isset($_POST['word']) || $_POST['word'] === '')
            $this->setErrors($obj->getTextRequired());
        else if(strlen($_POST['word']) < 3 )
            $this->setErrors($obj->getTextLenght());
    }
    //------------------------------------------------------------------
    function saveProduct($keyId){
        $myData = $this->getObj();
        $myData['Product'][$keyId] = array("Name"=>$_POST["name"], "Descreption"=>$_POST["descreption"], "Salary"=>$_POST["salary"], "Category"=>$_POST["category"]);
        if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']))
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'asset/product/'.$keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        $this->saveModel($myData);
    }
    function saveUsers($keyId){
        $myData = $this->getObj();
        $myData['Users'][$keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
        $this->saveModel($myData);
    }
    function saveFlexDataBase($keyId){
        $myData = $this->getObj();
        foreach ($this->getErrorsMessageReq() as $key => $value)
            $myData[$_GET['id']][$keyId][$key] = $_POST[$key];
        $this->saveModel($myData);
    }
    function saveBranch($keyId, $file){
        $file[$this->getFixedId()]['Branches'][$keyId] = array(
            "Name"=>$_POST["Name"],
            "Phone"=>$_POST["Phone"],
            "Country"=>$_POST["Country"],
            "Governments"=>$_POST["Governments"],
            "City"=>$_POST["City"],
            "Street"=>$_POST["Street"],
            "Building"=>$_POST["Building"],
            "Address"=>$_POST["Address"],
            "Follow"=>$_POST["Follow"]
        );
        $this->saveFile($file);
    }
    function saveLanguageDatabase($newKey, &$myData, $obj, $nameKey = 'AllNamesLanguage', $nameInput = 'lang_name'){
        foreach ($obj->getallNames() as $key=>$value)
            $myData[$key][$nameKey][$newKey] = $_POST[$nameInput];
    }
    function deleteItem($id){
        $myData = $this->getObj();
        if(count($myData[$id]) === 1)
            unset($myData[$id]);
        else
            unset($myData[$id][$_POST['id']]);
        $this->saveModel($myData);
    }
}
<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
class SettingUsersCreatePost extends ModelJson{
    use ErrorsKeyPassword, ErrorsEmailPassword;
    function __construct(){
        parent::__construct('SettingUsers');
        $keyAccount = $this->getRandomId();
        if(isset($_POST['Branches']) && count($this->getFileByFixedId()['Branches']) > 1 || isset($_POST['choices']) && count($this->getFileByFixedId()['Branches']) > 1 && $this->validBranchKeys()){
            // valid email and password
            $this->initErrorsEmailPassword3($this->getMyModal());
            //valid key password
            $this->validKeyPassword($this->getMyModal());
            $file = $this->getFile();
            foreach (isset($_POST['Branches']) ? $this->getFileByFixedId()['Branches'] : $_POST['choices'] as $keyBranch => $value)
                //check if email exist inside all branch inside user object
                if(in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $file[$keyBranch]['Users'])))
                    MySettingUsers::initMySettingUsers('EmailExist', 'danger');
                else
                    $file[$keyBranch]['Users'][$keyAccount] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
            $this->saveFile($file);
        }else{
            $this->initErrorsEmailPassword2($this->getMyModal());
            $this->initErrorsKeyPassword2($this->getMyModal(), $keyAccount);
        }
        MySettingUsers::initMySettingUsers('MessageModelCreate');
    }
}

new SettingUsersCreatePost();
}else
    header('LOCATION:view?id=SettingUsers');
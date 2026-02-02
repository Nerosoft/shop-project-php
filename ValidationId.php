<?php
require 'MessageError.php';
class ValidationId extends MessageError{
    function __construct($IdPage){
        parent::__construct($IdPage);
        if(!isset($_POST['id']) || $_POST['id'] === '')
            $this->setErrors($this->getModelPage()['IdIsReq']);
        else if(
        $this->getSCRIPTFILENAME() === 'BranchChangePost' && $_POST['id'] !== $this->getFixedId() && !isset($this->getBranch()[$_POST['id']])||
        !isset($this->getBranch()[$_POST['id']]) && $this->getUrlName2() === 'Branches' && $this->getSCRIPTFILENAME() !== 'BranchChangePost'||
        $this->getUrlName2() === 'Branches' && $_POST['id'] === $_SESSION['userId']&& $this->getSCRIPTFILENAME() !== 'BranchChangePost'||
        !isset($this->getModel2()['MyFlexTables'][$_POST['id']]) && $this->getUrlName2() === 'Home'||
        !isset($this->getModel2()['Style'][$_POST['id']]) && $this->getUrlName2() === 'MyStyle'||
        $this->getSCRIPTFILENAME() === 'FlexTablesEditPost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
        $this->getSCRIPTFILENAME() === 'FlexTablesDeletePost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
        !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getUrlName2() === 'ChangeLanguage'||
        $_POST['id'] === $this->getLanguage() && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost' && $this->getUrlName2() === 'ChangeLanguage'||

        !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getUrlName2() === 'Login' && $_POST['state'] ==='lang'||
        !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getUrlName2() === 'Register' && $_POST['state'] ==='lang'||
        !isset($this->getModel2()['Style'][$_POST['id']]) && $this->getUrlName2() === 'Login' && $_POST['state'] ==='style'||
        !isset($this->getModel2()['Style'][$_POST['id']]) && $this->getUrlName2() === 'Register' && $_POST['state'] ==='style'||

        !isset($this->getObj()['Users'][$_POST['id']]) && $this->getUrlName2() === 'SettingUsers')
            $this->setErrors($this->getModelPage()['IdIsInv']);
    }
}

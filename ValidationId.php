<?php
class ValidationId extends ModelJson{
    function __construct($IdPage){
        parent::__construct($IdPage);
        if(!isset($_POST['id']) || $_POST['id'] === '')
            $this->initViewPost($this->getModelPage()['IdIsReq']);
        else if(
        $this->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $this->getFixedId()||
        $this->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $this->getId()||
        $this->getUrlName2() === 'Branches' && !isset($this->getBranch()[$_POST['id']])||
        $this->getUrlName2() === 'Home' && !isset($this->getModel2()['MyFlexTables'][$_POST['id']])||
        $this->getUrlName2() === 'MyStyle' && !isset($this->getModel2()['Style'][$_POST['id']])||
        $this->getSCRIPTFILENAME() === 'FlexTablesEditPost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
        $this->getSCRIPTFILENAME() === 'FlexTablesDeletePost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
        $this->getUrlName2() === 'ChangeLanguage' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
        $this->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === $this->getLanguage() && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'||
        $this->getUrlName2() === 'ChangeLanguage' && $_POST['id'] === 'english' && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'||

        $this->getUrlName2() === 'Login' && $_POST['state'] ==='lang' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
        $this->getUrlName2() === 'Register' && $_POST['state'] ==='lang' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
        $this->getUrlName2() === 'Login' && $_POST['state'] ==='style' && !isset($this->getModel2()['Style'][$_POST['id']])||
        $this->getUrlName2() === 'Register' && $_POST['state'] ==='style' && !isset($this->getModel2()['Style'][$_POST['id']])||

        $this->getUrlName2() === 'SettingUsers' && !isset($this->getObj()['Users'][$_POST['id']])||
        $this->getUrlName2() === 'Product' && !isset($this->getObj()['Product'][$_POST['id']])
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
}

<?php
class ValidationId extends ModelJson{
    protected $keyId;
    function __construct($IdPage, $callback = null, $message = null){
        parent::__construct($IdPage);
        //make id for flex table and user stting and product else make id for all action
        if(ModelJson::getFileName() !== 'LoginPost' && ModelJson::getFileName() !== 'LoginForgetPasswordPost')
            $this->keyId = ModelJson::getFileName() !== 'BranchCreatePost' && 
            ModelJson::getFileName() !== 'ChangeLanguageCreatePost' && 
            ModelJson::getFileName() !== 'HomeCreatePost' && 
            ModelJson::getFileName() !== 'SetupProject' && 
            ModelJson::getFileName() !== 'RegisterPost' && 
            isset($_POST['id'])?$_POST['id']:$this->getRandomId();

        if(ModelJson::getFileName()==='LoginForgetPasswordPost' || 
        ModelJson::getFileName()==='LoginPost' || 
        ModelJson::getFileName() === 'RegisterPost'||
        ModelJson::getFileName() === 'SetupProject')
            $this->initErrorsEmailPassword3();
        //valid id first
        else if(ModelJson::getFileName()!=='BranchCreatePost' && ModelJson::getFileName()!=='FlexTablesCreatePost' && ModelJson::getFileName()!=='HomeCreatePost' && ModelJson::getFileName()!=='ChangeLanguageCreatePost' && ModelJson::getFileName()!=='SettingUsersCreatePost' && ModelJson::getFileName()!=='ProductCreatePost' && !isset($_POST['id']) ||
         ModelJson::getFileName()!=='BranchCreatePost' && ModelJson::getFileName()!=='FlexTablesCreatePost' && ModelJson::getFileName()!=='HomeCreatePost' && ModelJson::getFileName()!=='ChangeLanguageCreatePost' &&  ModelJson::getFileName()!=='SettingUsersCreatePost' && ModelJson::getFileName()!=='ProductCreatePost' && $_POST['id'] === '')
            $this->showError($this->getModelPage()['IdIsReq']);
        
        
        
        
        
        //make valid is array and count branch
        //make test id session inside array choices
        else if(isset($_POST['choices']) && is_array($_POST['choices']) && isset($_POST['choices'][$this->getId()])|| 
            isset($_POST['choices']) && !is_array($_POST['choices']) ||
            isset($_POST['choices']) && count($this->getBranch()) === 1||
            isset($_POST['Branches']) && count($this->getBranch()) === 1)
            $this->showError($this->getModel2()['AppSettingAdmin']['BranchInv']);






        //make add edit delete for home and language and users and product inside all branch
        else if(
            


            isset($_POST['Branches']) && ModelJson::getFileName() === 'HomeCreatePost' && is_null($this->validName())||
            isset($_POST['choices']) && ModelJson::getFileName() === 'HomeCreatePost' && is_null($this->validName())||
            isset($_POST['Branches']) && ModelJson::getFileName() === 'HomeEditPost' && is_null($this->validName())||
            isset($_POST['choices']) && ModelJson::getFileName() === 'HomeEditPost' && is_null($this->validName())||

            isset($_POST['Branches']) && ModelJson::getFileName() === 'HomeDeletePost'||
            isset($_POST['choices']) && ModelJson::getFileName() === 'HomeDeletePost'||

            isset($_POST['Branches']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && is_null($this->initErrorFlexTable2())||
            isset($_POST['choices']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && is_null($this->initErrorFlexTable2())||

            isset($_POST['Branches']) && ModelJson::getFileName() === 'ProductCreatePost' && is_null($this->validProductInput())||
            isset($_POST['choices']) && ModelJson::getFileName() === 'ProductCreatePost' && is_null($this->validProductInput())||

            isset($_POST['Branches']) && ModelJson::getFileName() === 'SettingUsersCreatePost' && is_null($this->initErrorsEmailPassword3())||
            isset($_POST['choices']) && ModelJson::getFileName() === 'SettingUsersCreatePost' && is_null($this->initErrorsEmailPassword3())||
            
            //product and uesrs and flextable
            isset($_POST['Branches']) && ModelJson::getFileName() === 'SettingUsersDeletePost'||
            isset($_POST['choices']) && ModelJson::getFileName() === 'SettingUsersDeletePost'||


            isset($_POST['Branches']) && ModelJson::getFileName() === 'ChangeLanguagePost'||
            isset($_POST['choices']) && ModelJson::getFileName() === 'ChangeLanguagePost'||
            isset($_POST['Branches']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost'||
            isset($_POST['choices']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost'||
            isset($_POST['Branches']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && is_null($this->validLanguageInput())||
            isset($_POST['choices']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && is_null($this->validLanguageInput())||
            isset($_POST['Branches']) && ModelJson::getFileName() === 'ChangeLanguageCreatePost' && is_null($this->validLanguageInput())||
            isset($_POST['choices']) && ModelJson::getFileName() === 'ChangeLanguageCreatePost' && is_null($this->validLanguageInput())



           ){
            //make declar file if delete item and test id
            $myFile = $this->getFile();
            foreach (isset($_POST['Branches']) ? $this->getBranch() : array(...$_POST['choices'], $this->getId()=>$this->getId()) as $key => $value)
                //make test id branch if user select choices option
                if(!isset($_POST['Branches']) && !isset($this->getBranch()[$key]))
                    $this->showError($this->getModel2()['AppSettingAdmin']['BranchInv']);
                //make text id inside all branch for users and product and home and language (only edit)
                //use $IdPage only(users and product)
                //style dont create use getUrlName2
                else if(isset($_POST['id']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($myFile[$key][$_GET['id']][$_POST['id']]) ||
                    !isset($_POST['id']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$_GET['id']]) ||
                    
                    ModelJson::getFileName() === 'ChangeLanguageEditPost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$this->getUrlName2() === 'MyStyle'?'Style':'AllNamesLanguage'][$_POST['id']]) ||
                    ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$_POST['state']][$_POST['id']]) ||
                    ModelJson::getFileName() === 'ChangeLanguageDeletePost' && !isset($myFile[$key][$_POST['id']]) ||
                    ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_POST['id'] === 'english' ||
                    ModelJson::getFileName() === 'HomeEditPost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$_POST['id']]) ||
                    ModelJson::getFileName() === 'HomeDeletePost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$_POST['id']]) ||
                  
                ModelJson::getFileName() === 'ProductDeletePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']])||
                //valid users and flex table getUrlName2
                ModelJson::getFileName() === 'SettingUsersDeletePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']]) ||
                  //ignore create validation account and product
                  isset($_POST['id']) && ModelJson::getFileName() === 'ProductCreatePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']])||
                  isset($_POST['id']) && ModelJson::getFileName() === 'SettingUsersCreatePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']]))
                    $this->showError($this->getModelPage()['IdIsInv']);
                else
                    $myFile[$key] = $callback($myFile[$key], $key);
            $this->saveFile($myFile);
            $this->showMessage($this->getModelPage()[$message], 'success');
        }


        else if(
            isset($_POST['id']) && ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($this->getModel2()[$_POST['state']][$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() === 'BranchChangePost' && !isset($this->getBranch()[$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() === 'BranchDeletePost' && $_POST['id'] === $this->getFixedId()||
            isset($_POST['id']) && ModelJson::getFileName() === 'BranchDeletePost' && $_POST['id'] === $this->getId()||
            //check lang name = english (system) and = (select language)
            isset($_POST['id']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_POST['id'] === $this->getLanguage()||
            isset($_POST['id']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_POST['id'] === 'english'||
            //valid users and flex table $_GET['id']
            isset($_POST['id']) && ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] !== 'branch' && $_POST['state'] !== 'branch2' && !isset($this->getModel2()[$_POST['state']][$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] === 'branch' && !isset($this->getBranch()[$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] === 'branch2' && !isset($this->getFile()[$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
            //work delete add edit user and product and home and change language
            isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Home' && !isset($this->getModel2()['MyFlexTables'][$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Branches' && !isset($this->getBranch()[$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'ChangeLanguage' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Users' && !isset($this->getObj()['Users'][$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Product' && !isset($this->getObj()['Product'][$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
            isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'MyStyle' && !isset($this->getModel2()['Style'][$_POST['id']])
        )
            $this->showError($this->getModelPage()['IdIsInv']);
        else if(ModelJson::getFileName() === 'BranchEditPost' || ModelJson::getFileName() === 'BranchCreatePost')
            $this->initErrorBranch2();
        else if(ModelJson::getFileName() === 'ChangeLanguageEditPost' || ModelJson::getFileName() === 'ChangeLanguageCreatePost')
            $this->validLanguageInput();
        else if(ModelJson::getFileName() === 'HomeCreatePost' || ModelJson::getFileName() === 'HomeEditPost')
            $this->validName();
        
    }
    function deleteItem($myData){
        if(count($myData[$this->getUrlName2()]) === 1)
            unset($myData[$this->getUrlName2()]);
        else
            unset($myData[$this->getUrlName2()][$_POST['id']]);
        return $myData;
    }
}

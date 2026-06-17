<?php
class ValidationId extends ModelJson{
    protected $keyId;
    function __construct($IdPage, $callback = null, $message = null){
        parent::__construct($IdPage);
        //make id for flex table and user stting and product else make id for all action
        $this->keyId = $this->getSCRIPTFILENAME() !== 'BranchCreatePost' && 
        $this->getSCRIPTFILENAME() !== 'ChangeLanguageCreatePost' && 
        $this->getSCRIPTFILENAME() !== 'HomeCreatePost' && 
        $this->getSCRIPTFILENAME() !== 'SetupProject' && 
        $this->getSCRIPTFILENAME() !== 'RegisterPost' && 
        isset($_POST['id'])?$_POST['id']:$this->getRandomId();
        if($this->getSCRIPTFILENAME()==='LoginForgetPasswordPost' || 
        $this->getSCRIPTFILENAME()==='LoginPost' || 
        $this->getSCRIPTFILENAME() === 'RegisterPost'||
        $this->getSCRIPTFILENAME() === 'SetupProject')
            $this->initErrorsEmailPassword3();
        //valid id first
        else if($this->getSCRIPTFILENAME()!=='BranchCreatePost' && $this->getSCRIPTFILENAME()!=='FlexTablesCreatePost' && $this->getSCRIPTFILENAME()!=='HomeCreatePost' && $this->getSCRIPTFILENAME()!=='ChangeLanguageCreatePost' && $this->getSCRIPTFILENAME()!=='SettingUsersCreatePost' && $this->getSCRIPTFILENAME()!=='ProductCreatePost' && !isset($_POST['id']) ||
         $this->getSCRIPTFILENAME()!=='BranchCreatePost' && $this->getSCRIPTFILENAME()!=='FlexTablesCreatePost' && $this->getSCRIPTFILENAME()!=='HomeCreatePost' && $this->getSCRIPTFILENAME()!=='ChangeLanguageCreatePost' &&  $this->getSCRIPTFILENAME()!=='SettingUsersCreatePost' && $this->getSCRIPTFILENAME()!=='ProductCreatePost' && $_POST['id'] === '')
            ModelJson::initView2($this->getUrlName2(), $this->getModelPage()['IdIsReq']);
        
        
        
        
        
        //make valid is array and count branch
        //make test id session inside array choices
        else if(isset($_POST['choices']) && is_array($_POST['choices']) && isset($_POST['choices'][$this->getId()])|| 
            isset($_POST['choices']) && !is_array($_POST['choices']) ||
            isset($_POST['choices']) && count($this->getBranch()) === 1||
            isset($_POST['Branches']) && count($this->getBranch()) === 1)
            ModelJson::initView2($this->getUrlName2(), $this->getModel2()['AppSettingAdmin']['BranchInv']);






        //make add edit delete for home and language and users and product inside all branch
        else if(
            


            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'HomeCreatePost' && is_null($this->validName())||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'HomeCreatePost' && is_null($this->validName())||
            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'HomeEditPost' && is_null($this->validName())||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'HomeEditPost' && is_null($this->validName())||

            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'HomeDeletePost'||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'HomeDeletePost'||

            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'FlexTablesCreatePost' && is_null($this->initErrorFlexTable2())||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'FlexTablesCreatePost' && is_null($this->initErrorFlexTable2())||

            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'ProductCreatePost' && is_null($this->validProductInput($this->getMyModal()))||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'ProductCreatePost' && is_null($this->validProductInput($this->getMyModal()))||

            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'SettingUsersCreatePost' && is_null($this->initErrorsEmailPassword3())||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'SettingUsersCreatePost' && is_null($this->initErrorsEmailPassword3())||
            
            //product and uesrs and flextable
            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'SettingUsersDeletePost'||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'SettingUsersDeletePost'||


            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'ChangeLanguagePost'||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'ChangeLanguagePost'||
            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost'||
            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageEditPost' && is_null($this->validLanguageInput())||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageEditPost' && is_null($this->validLanguageInput())||
            isset($_POST['Branches']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageCreatePost' && is_null($this->validLanguageInput())||
            isset($_POST['choices']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageCreatePost' && is_null($this->validLanguageInput())



           ){
            //make declar file if delete item and test id
            $myFile = $this->getFile();
            foreach (isset($_POST['Branches']) ? $this->getBranch() : array(...$_POST['choices'], $this->getId()=>$this->getId()) as $key => $value)
                //make test id branch if user select choices option
                if(!isset($_POST['Branches']) && !isset($this->getBranch()[$key]))
                    ModelJson::initView2($this->getUrlName2(), $this->getModel2()['AppSettingAdmin']['BranchInv']);
                //make text id inside all branch for users and product and home and language (only edit)
                //use $IdPage only(users and product)
                //style dont create use getUrlName2
                else if(isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'FlexTablesCreatePost' && !isset($myFile[$key][$_GET['id']][$_POST['id']]) ||
                    !isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'FlexTablesCreatePost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$_GET['id']]) ||
                    
                    $this->getSCRIPTFILENAME() === 'ChangeLanguageEditPost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$_POST['option'] === 'MyStyle'?'Style':'AllNamesLanguage'][$_POST['id']]) ||
                    $this->getSCRIPTFILENAME() === 'ChangeLanguagePost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$_POST['state']][$_POST['id']]) ||
                    $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost' && !isset($myFile[$key][$_POST['id']]) ||
                    $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost' && $_POST['id'] === 'english' ||
                    $this->getSCRIPTFILENAME() === 'HomeEditPost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$_POST['id']]) ||
                    $this->getSCRIPTFILENAME() === 'HomeDeletePost' && !isset($myFile[$key][$myFile[$key]['Setting']['AllNamesLanguage']][$_POST['id']]) ||
                  
                $this->getSCRIPTFILENAME() === 'ProductDeletePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']])||
                //valid users and flex table getUrlName2
                $this->getSCRIPTFILENAME() === 'SettingUsersDeletePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']]) ||
                  //ignore create validation account and product
                  isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'ProductCreatePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']])||
                  isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'SettingUsersCreatePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']]))
                    ModelJson::initView2($this->getUrlName2(), $this->getModelPage()['IdIsInv']);
                else
                    $myFile[$key] = $callback($myFile[$key], $key);
            $this->saveFile($myFile);
            ModelJson::initView2($this->getUrlName2(), $message, 'success');
        }


        else if(
            // isset($_POST['id']) && isset($_POST['state']) && !isset($this->getModel2()[$_POST['state']][$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'ChangeLanguagePost' && !isset($this->getModel2()[$_POST['state']][$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'BranchChangePost' && !isset($this->getBranch()[$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $this->getFixedId()||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'BranchDeletePost' && $_POST['id'] === $this->getId()||
            //check lang name = english (system) and = (select language)
            isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost' && $_POST['id'] === $this->getLanguage()||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'ChangeLanguageDeletePost' && $_POST['id'] === 'english'||
            //valid users and flex table $_GET['id']
            isset($_POST['id']) && $this->getSCRIPTFILENAME() !== 'BranchChangePost' && $this->getSCRIPTFILENAME() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Login' && !isset($this->getModel2()[$_POST['state']][$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() !== 'BranchChangePost' && $this->getSCRIPTFILENAME() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Register' && !isset($this->getModel2()[$_POST['state']][$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() !== 'BranchChangePost' && $this->getSCRIPTFILENAME() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Site' && !isset($this->getModel2()[$_POST['state']][$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'SettingUsersDeletePost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
            //work delete add edit user and product and home and change language
            isset($_POST['id']) && $this->getSCRIPTFILENAME() !== 'BranchChangePost' && $this->getSCRIPTFILENAME() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Home' && !isset($this->getModel2()['MyFlexTables'][$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() !== 'BranchChangePost' && $this->getSCRIPTFILENAME() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Branches' && !isset($this->getBranch()[$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() !== 'BranchChangePost' && $this->getSCRIPTFILENAME() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'ChangeLanguage' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() !== 'BranchChangePost' && $this->getSCRIPTFILENAME() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Users' && !isset($this->getObj()['Users'][$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() !== 'BranchChangePost' && $this->getSCRIPTFILENAME() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Product' && !isset($this->getObj()['Product'][$_POST['id']])||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() === 'FlexTablesCreatePost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
            isset($_POST['id']) && $this->getSCRIPTFILENAME() !== 'BranchChangePost' && $this->getSCRIPTFILENAME() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'MyStyle' && !isset($this->getModel2()['Style'][$_POST['id']])
        )
            ModelJson::initView2($this->getUrlName2(), $this->getModelPage()['IdIsInv']);
        else if($this->getSCRIPTFILENAME() === 'BranchEditPost' || $this->getSCRIPTFILENAME() === 'BranchCreatePost')
            $this->initErrorBranch2();
        else if($this->getSCRIPTFILENAME() === 'ChangeLanguageEditPost' || $this->getSCRIPTFILENAME() === 'ChangeLanguageCreatePost')
            $this->validLanguageInput();
        else if($this->getSCRIPTFILENAME() === 'FlexTablesCreatePost')
            $this->initErrorFlexTable2();
        else if($this->getSCRIPTFILENAME() === 'ProductCreatePost')
            $this->validProductInput($this->getMyModal());
        else if($this->getSCRIPTFILENAME() === 'SettingUsersCreatePost')
            $this->initErrorsEmailPassword3();
        
        else if($this->getSCRIPTFILENAME() === 'HomeCreatePost' || $this->getSCRIPTFILENAME() === 'HomeEditPost')
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

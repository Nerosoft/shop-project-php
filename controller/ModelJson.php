<?php
require 'interface/DeleteInfoName.php';

class ModelJson{
    private $File;
    private $IdPage;
    private $Language;
    private $count;
    private $MyIdDb;
    function getCount(){
        return $this->count;
    }
    function plusCount(){
        $this->count+=1;
    }
    function showErrorServer(){
        $_SESSION['error'] = $this->getModel2()[isset($_SESSION['userId'])?'Home':'Login']['ErrorServerMessage'];
        header("Location:".(isset($_SESSION['userId'])?'Home':'Login'));
        exit;
    }
    function __construct($idPage = null, $DataView = null, $keysTable = null, $keyItem = null){
        $this->File = json_decode(file_get_contents('data.json'), true);
        $this->IdPage = $idPage??($_GET['id']??null);
        $this->MyIdDb = (isset($_SESSION['userId'])?$_SESSION['userId']:($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id']) && isset($this->getFile()[$_GET['id']])?$_GET['id']:(isset($_COOKIE['branchId']) && isset($this->getFile()[$_COOKIE['branchId']])?$_COOKIE['branchId']:'admin')));
        $this->Language = !isset($_SESSION['userId']) && isset($_COOKIE[$this->getId().'AllNamesLanguage']) && isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']])?$_COOKIE[$this->getId().'AllNamesLanguage']:$this->getObj()['AllNamesLanguage'];
        if(
            !isset($_SESSION['userId']) && isset($_COOKIE['branchId']) && !isset($this->getFile()[$_COOKIE['branchId']])||
            !isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id']) && !isset($this->getFile()[$_GET['id']])||
            !isset($_SESSION['userId']) && isset($_COOKIE[$this->getId().'AllNamesLanguage']) && !isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']])||
            !isset($_SESSION['userId']) && isset($_COOKIE[$this->getId().'Style']) && !isset($this->getObj()[$this->getLanguage()]['Style'][$_COOKIE[$this->getId().'Style']])||
            // !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // !isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // !isset($_SESSION['userId']) && ModelJson::getFileName() === 'RegisterPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginForgetPasswordPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && !isset($_POST['state'])||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && !isset($_GET['id'])||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] !== 'AllNamesLanguage' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'branch' && $_POST['state'] !== 'branch2'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && 
            $_GET['id'] !== 'Login' && 
            $_GET['id'] !== 'Register' && 
            $_GET['id'] !== 'Site'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject' && 
            $_GET['id'] !== 'Login' && 
            $_GET['id'] !== 'Register'){
            if(isset($_COOKIE['branchId']) && !isset($this->getFile()[$_COOKIE['branchId']]))
                setcookie('branchId', '', time()-3600);
            else if(isset($_COOKIE[$this->getId().'AllNamesLanguage']) && !isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']]))
                setcookie($this->getId().'AllNamesLanguage', '', time()-3600);
            else if(isset($_COOKIE[$this->getId().'Style']) && !isset($this->getObj()[$this->getLanguage()]['Style'][$_COOKIE[$this->getId().'Style']]))
                setcookie($this->getId().'Style', '', time()-3600);
           $this->showErrorServer();
        }
        else if(
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLang' && isset($_GET['lang']) && isset($_GET['table']) && !isset($this->getObj()[$_GET['lang']][$_GET['table']])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables' && !isset($_GET['id'])||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchChangePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables' && !isset($this->getObj()[$this->getObj()['AllNamesLanguage']]['MyFlexTables'][$_GET['id']]) ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($this->getObj()[$this->getObj()['AllNamesLanguage']]['MyFlexTables'][$_GET['id']??'']) ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && $_GET['id'] !== 'Users' && $_GET['id'] !== 'Product' && !isset($this->getObj()[$this->getObj()['AllNamesLanguage']]['MyFlexTables'][$_GET['id']])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchChangePost' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchChangePost' && 
            !isset($this->getObj()[$this->getObj()['AllNamesLanguage']]['MyFlexTables'][$_GET['id']]) &&
            $_GET['id'] !== 'SystemLang' &&
            $_GET['id'] !== 'Home' && 
            $_GET['id'] !== 'Branches' &&
            $_GET['id'] !== 'ChangeLanguage' &&
            $_GET['id'] !== 'Users' &&
            $_GET['id'] !== 'Product' &&
            $_GET['id'] !== 'MyStyle' &&
            $_GET['id'] !== 'Site'||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'ProductCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLangEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            // isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && $_GET['id'] !== 'ChangeLanguage' && $_GET['id'] !== 'MyStyle'||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && 
            !isset($this->getObj()[$this->getObj()['AllNamesLanguage']]['MyFlexTables'][$_GET['id']]) &&
            $_GET['id'] !== 'SystemLang' &&
            $_GET['id'] !== 'Home' && 
            $_GET['id'] !== 'Branches' &&
            $_GET['id'] !== 'ChangeLanguage' &&
            $_GET['id'] !== 'Users' &&
            $_GET['id'] !== 'Product' &&
            $_GET['id'] !== 'MyStyle' &&
            $_GET['id'] !== 'Site'||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($_POST['state'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'AllNamesLanguage'
            ){
           $this->showErrorServer();
        }else if($_SERVER["REQUEST_METHOD"] === "GET"){
            if(!isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id']) && isset($this->getFile()[$_GET['id']]))
                setcookie('branchId', $_GET['id'], time()+2628000);
            $this->StyleFile = isset($_COOKIE[$this->getId().'Style']) && isset($this->getModel2()['Style'][$_COOKIE[$this->getId().'Style']]) && !isset($_SESSION['userId'])?$_COOKIE[$this->getId().'Style']:$this->getObj()['Style'];
            $this->styleLangAction = (isset($_SESSION['userId'])?'ChangeLanguagePost':'ChangeLangPost').'?id='.$idPage;
            
            $this->ActiveBranch = $this->getModelPage()['ActiveBranch'];
            $this->ChangeTitleBranch = $this->getModelPage()['ChangeTitleBranch'];
            $this->ChangeButtonBranch = $this->getModelPage()['ChangeButtonBranch'];
            
            $this->ChangeLang = $this->getModelPage()['UsedLanguage'];
            $this->ModelTitle = $this->getModelPage()['ModelTitle'];
            $this->ModelButton = $this->getModelPage()['ModelButton'];
            $this->MyLanguage = MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']);
            
            $this->ChangeStyle = $this->getModelPage()['UsedStyle'];
            $this->ModalTitleStyle = $this->getModelPage()['ModalTitleStyle'];
            $this->ModalButtonStyle = $this->getModelPage()['ModalButtonStyle'];
            $this->Style = MyLanguage::fromArray($this->getModel2()['Style']);

            $this->Message = $_SESSION['error']??($_SESSION['message']??$this->getModelPage()['LoadMessage']);
            $this->Type = isset($_SESSION['error'])?'danger':'success';
            if(isset($_SESSION['message']) || isset($_SESSION['error']))
                unset($_SESSION['message'], $_SESSION['error']);
            $this->Title = $this->getModelPage()['Title'];
            echo<<<HTML
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>{$this->getTitle()}</title>
                <link href="./asset/css/style.css" rel="stylesheet">
                <link href="./asset/lib/bootstrap.min.css" rel="stylesheet">
                <script src="./asset/lib/jquery.min.js" type="text/javascript"></script>
                <script src="./asset/lib/bootstrap.bundle.min.js" type="text/javascript"></script>
                <script src="./asset/js/script.js" type="text/javascript" defer></script>
                <link href="./asset/css/{$this->getStyleFile()}.css" rel="stylesheet">
                <link rel="stylesheet" href="./asset/css/font-awesome.min.css">
            HTML;

            if(ModelJson::getFileName() !== 'Login' && ModelJson::getFileName() !== 'Register'){
                echo '<link href="./asset/lib/dataTables.bootstrap5.css" rel="stylesheet">
                <link rel="stylesheet" href="./asset/css/aos.css">
                <link rel="stylesheet" href="./asset/css/owl.carousel.min.css">
                <link rel="stylesheet" href="./asset/css/owl.theme.default.min.css">
                <script src="./asset/lib/dataTables.js" type="text/javascript"></script>
                <script src="./asset/lib/dataTables.bootstrap5.js" type="text/javascript"></script>';
                if($this->getUrlName2() === 'Site')
                    echo '<link rel="stylesheet" href="./asset/css/templatemo-digital-trend.css">';
                echo '</head><body>';
                $this->count = 1;
                $this->DataView = $DataView();
                $this->AllBranches = $this->getModelPage()['AllBranches'];
                $this->Ssearch = $this->getModelPage()['Ssearch'];
                $this->InfoEmpty = $this->getModelPage()['InfoEmpty'];
                $this->ZeroRecords = $this->getModelPage()['ZeroRecords'];
                $this->Info = $this->getModelPage()['Info'];
                $this->LengthMenu = $this->getModelPage()['LengthMenu'];
                $this->InfoFiltered = $this->getModelPage()['InfoFiltered'];

                $this->Offcanvas = $this->getModelPage()['Offcanvas'];
                $this->AdminDashboard = $this->getModelPage()['AdminDashboard'];


                if($this->getUrlName2() === 'Site'){
                    $this->myMenuApp = $this->getModelPage()['AllMenu'];
                    if(isset($_SESSION['userId'])){
                        $this->initFlexTable();
                        unset($this->myMenuApp['Login'], $this->myMenuApp['Register']);
                    }
                }else if($this->getUrlName2() === 'SystemLang'){
                    $this->myMenuApp = array('Home'=>$this->getModelPage()['Home'],
                    'Logout'=>$this->getModelPage()['Logout'],
                    'SystemLang'=>$this->getModelPage()['EditAllLang']);
                    foreach ($this->getModel2()['AllNamesLanguage'] as $key => $value){
                        $this->myMenuApp[$key] = array($value);
                        foreach (array_keys($this->getModel2()) as $key2 => $table) 
                            $this->myMenuApp[$key][$table] = $this?->getModel2()[$table]['MYTITLE']??$this->getModelPage()[$table];
                    }
                }
                else
                    $this->initFlexTable();     
                include 'pis_of_page/admin_title.php';
                if($this->getUrlName2() !== 'Site'){
                    echo '<div class="start-page container">';
                    $this->keysTable = $keysTable??array('TableProductImage', ...array_keys($this->getTableHead()));
                    $this->TableId = $this->getModelPage()['TableId'];
                    $this->TabelEvent = $this->getModelPage()['TabelEvent'];
                    $this->ScreenModelEdit = $this->getModelPage()['ScreenModelEdit'];
                    $this->ButtonModelEdit = $this->getModelPage()['ButtonModelEdit'];
                    if($this->getUrlName2() !== 'SystemLang' && $this->getUrlName2() !== 'MyStyle'){
                        $this->ScreenModelDelete = $this->getModelPage()['ScreenModelDelete'];
                        $this->messageModelDelete = $this->getModelPage()['MessageModelDelete'];
                        $this->buttonModelDelete = $this->getModelPage()['ButtonModelDelete'];
                        echo <<<HTML
                            <button onclick="openForm('#createModel')" class="btn btn-primary">{$this->getModelPage()['ButtonModelCreate']}</button>
                        HTML;
                        $this->makeCreateModal($this, $this->getModelPage()['ScreenModelCreate'], $this->getModelPage()['ButtonModelAdd']);
                    }
                    echo'
                        <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>'.$this->getTableId().'</th>';
                    $this->printTableNames();
                    echo '<th>'.$this->getTabelEvent().'</th>
                            </tr>
                        </thead>
                        <tbody>';
                }else
                        echo '<div class="start-page">';
            }else{
                $this->BranchLabel = $this->getModelPage()['BranchLabel'];
                $this->ChangeStyleButton = $this->getModelPage()['ChangeStyleButton'];
                $this->ChangeLanguageButton = $this->getModelPage()['ChangeLanguageButton']; foreach ($this->getFile() as $key => $obj)
                foreach ($this->getFile() as $key => $obj)
                    if(isset($obj['Branches'])){
                        $this->dbKeys[$key] = new branch($obj['Branches'][$key]['Name']);
                        if(isset($obj['Branches'][$this->getId()]))
                            $this->dbBranchKeys = $key;
                    }
                $this->initInfoBranch();
                $this->initErrorBranch();
                $this->initEmailPassword();
                $this->BranchProjectTitle = $this->getModelPage()['BranchProjectTitle'];
                $this->BranchProjectButton = $this->getModelPage()['BranchProjectButton'];
                $this->ActiveBranchProject = $this->getModelPage()['ActiveBranchProject'];
                $this->TitleForm = $this->getModelPage()['TitleForm'];
                $this->ButtonName = $this->getModelPage()['ButtonName'];
                $this->DbKeyLabel = $this->getModelPage()['DbKeyLabel'];
                $this->AppLabel = $this->getModelPage()['AppLabel'];
                $this->AllBranch = $this->getModelPage()['AllBranch'];
                $this->ModalTitleProject = $this->getModelPage()['ModalTitleProject'];
                $this->ModalButtonProject = $this->getModelPage()['ModalButtonProject'];
                $this->ButtonSetupProject = $this->getModelPage()['ButtonSetupProject'];
                $this->RegisterLoginPage = $this->getModelPage()['RegisterLoginPage'];
                echo<<<HTML
                    <link href="./asset/css/login_register.css" rel="stylesheet"></head><body>
                    <div class="container">
                        <div id="createModel" class="register">
                            <form method='POST' action="{$DataView}">
                HTML; 
                $view = $this;
                include 'pis_of_page/login_form.php';
            }

        }else if(ModelJson::getFileName()==='LoginForgetPasswordPost' || ModelJson::getFileName()==='LoginPost' || 
                ModelJson::getFileName() === 'RegisterPost' || ModelJson::getFileName() === 'SetupProject'){
                $this->initErrorsEmailPassword3();
                if(ModelJson::getFileName() === 'RegisterPost' || ModelJson::getFileName() === 'SetupProject')
                    $this->keyId = $keyItem;
        }else if(ModelJson::getFileName()==='SystemLangEditPost' && isset($_POST['choices']) && count($this->getModel2()['AllNamesLanguage']) === 1||
        ModelJson::getFileName()!=='SystemLangEditPost' && isset($_POST['choices']) && is_array($_POST['choices']) && isset($_POST['choices'][$this->getId()])|| 
        ModelJson::getFileName()!=='SystemLangEditPost' && isset($_POST['choices']) && count($this->getBranch()) === 1)
            $this->showError($this->getModelPage()['BranchInv']);       
        else if(ModelJson::getFileName()!== 'SystemLangEditPost'){
            // 'BranchCreatePost'  'ChangeLanguageCreatePost'  'HomeCreatePost'  'SetupProject'  'RegisterPost' 
            $this->keyId = $keyItem??($_POST['id']??ModelJson::getRandomKey());
            if(isset($_POST['choices']) && is_array($_POST['choices']) && isset($_POST['choices'][$this->getId()])|| 
                isset($_POST['choices']) && count($this->getBranch()) === 1)
                $this->showError($this->getModelPage()['BranchInv']);
            //valid id first
            else if(ModelJson::getFileName()!=='BranchCreatePost' && ModelJson::getFileName()!=='FlexTablesCreatePost' && ModelJson::getFileName()!=='HomeCreatePost' && ModelJson::getFileName()!=='ChangeLanguageCreatePost' && ModelJson::getFileName()!=='SettingUsersCreatePost' && ModelJson::getFileName()!=='ProductCreatePost' && !isset($_POST['id']) ||
                ModelJson::getFileName()!=='BranchCreatePost' && ModelJson::getFileName()!=='FlexTablesCreatePost' && ModelJson::getFileName()!=='HomeCreatePost' && ModelJson::getFileName()!=='ChangeLanguageCreatePost' &&  ModelJson::getFileName()!=='SettingUsersCreatePost' && ModelJson::getFileName()!=='ProductCreatePost' && $_POST['id'] === '')
                $this->showError($this->getModelPage()['IdIsReq']);
            else if(
                


                isset($_POST['choices']) && ModelJson::getFileName() === 'HomeCreatePost' && is_null($this->validName())||
                isset($_POST['choices']) && ModelJson::getFileName() === 'HomeEditPost' && is_null($this->validName())||

                isset($_POST['choices']) && ModelJson::getFileName() === 'HomeDeletePost'||

                isset($_POST['choices']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && is_null($this->initErrorFlexTable2())||

                isset($_POST['choices']) && ModelJson::getFileName() === 'ProductCreatePost' && is_null($this->validProductInput())||

                isset($_POST['choices']) && ModelJson::getFileName() === 'SettingUsersCreatePost' && is_null($this->initErrorsEmailPassword3())||
                
                //product and uesrs and flextable
                isset($_POST['choices']) && ModelJson::getFileName() === 'SettingUsersDeletePost'||


                isset($_POST['choices']) && ModelJson::getFileName() === 'ChangeLanguagePost'||
                isset($_POST['choices']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost'||
                isset($_POST['choices']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && is_null($this->validLanguageInput())||
                isset($_POST['choices']) && ModelJson::getFileName() === 'ChangeLanguageCreatePost' && is_null($this->validLanguageInput())



            ){
                $myFile = $this->getFile();
                foreach (is_array($_POST['choices'])?array(...$_POST['choices'], $this->getId()=>$this->getId()):$this->getBranch() as $key => $value)
                    //make test id branch if user select choices option
                    if(is_array($_POST['choices']) && !isset($this->getBranch()[$key]))
                        $this->showError($this->getModelPage()['BranchInv']);
                  

                    else if(isset($_POST['id']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']]) ||
                        !isset($_POST['id']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($myFile[$key][$myFile[$key]['AllNamesLanguage']][$this->getUrlName2()]) ||
                        
                        ModelJson::getFileName() === 'ChangeLanguageEditPost' && !isset($myFile[$key][$myFile[$key]['AllNamesLanguage']][$this->getUrlName2() === 'MyStyle'?'Style':'AllNamesLanguage'][$_POST['id']]) ||
                        ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($myFile[$key][$myFile[$key]['AllNamesLanguage']][$_POST['state']][$_POST['id']]) ||
                        ModelJson::getFileName() === 'ChangeLanguageDeletePost' && !isset($myFile[$key][$_POST['id']]) ||
                        ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_POST['id'] === 'english' ||
                        ModelJson::getFileName() === 'HomeEditPost' && !isset($myFile[$key][$myFile[$key]['AllNamesLanguage']][$_POST['id']]) ||
                        ModelJson::getFileName() === 'HomeDeletePost' && !isset($myFile[$key][$myFile[$key]['AllNamesLanguage']][$_POST['id']]) ||
                    
                    ModelJson::getFileName() === 'ProductDeletePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']])||
                    //valid users and flex table getUrlName2
                    ModelJson::getFileName() === 'SettingUsersDeletePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']]) ||
                    //ignore create validation account and product
                    isset($_POST['id']) && ModelJson::getFileName() === 'ProductCreatePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']])||
                    isset($_POST['id']) && ModelJson::getFileName() === 'SettingUsersCreatePost' && !isset($myFile[$key][$this->getUrlName2()][$_POST['id']]))
                        $this->showError($this->getModelPage()['IdIsInv']);
                    else
                        $myFile[$key] = $DataView($myFile[$key], $key);
                $this->saveFile($myFile);
                $this->showMessage($this->getModelPage()[$keysTable], 'success');
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
                isset($_POST['id']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && !isset($this->getObj()[$this->getUrlName2()][$_POST['id']]) ||
                //work delete add edit user and product and home and change language
                isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Home' && !isset($this->getModel2()['MyFlexTables'][$_POST['id']])||
                isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Branches' && !isset($this->getBranch()[$_POST['id']])||
                isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'ChangeLanguage' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
                isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Users' && !isset($this->getObj()['Users'][$_POST['id']])||
                isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'Product' && !isset($this->getObj()['Product'][$_POST['id']])||
                isset($_POST['id']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($this->getObj()[$this->getUrlName2()][$_POST['id']]) ||
                isset($_POST['id']) && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && $this->getUrlName2() === 'MyStyle' && !isset($this->getModel2()['Style'][$_POST['id']])
            )
                $this->showError($this->getModelPage()['IdIsInv']);
            
            else if(ModelJson::getFileName() === 'ChangeLanguageEditPost' || ModelJson::getFileName() === 'ChangeLanguageCreatePost')
                $this->validLanguageInput();
            else if(ModelJson::getFileName() === 'HomeCreatePost' || ModelJson::getFileName() === 'HomeEditPost')
                $this->validName();
            else if(ModelJson::getFileName() === 'BranchEditPost' || ModelJson::getFileName() === 'BranchCreatePost')
                $this->initErrorBranch2();
        }
    
    }
    function initFlexTable(){
        foreach (array_keys($this->getModel2()) as $key2 => $table)
            if(!isset($this->getModel2()['MyFlexTables'][$table])&&
                $table !== 'Style' && 
                $table !== 'MyFlexTables' && 
                $table !== 'Login' && 
                $table !== 'Register' && 
                $table !== 'AllNamesLanguage')
                $this->myMenuApp[$table] = $this->getModel2()[$table]['MYTITLE'];

        $this->myMenuApp['Logout'] = $this->getModelPage()['Logout'];
        if(isset($this->getModel2()['MyFlexTables']))
            $this->myMenuApp['MyFlexTables'] = array($this->getModelPage()['MyFlexTables'], ...$this->getModel2()['MyFlexTables']);
    }
    function loginAdmin($message = 'LoginMessage'){
        $message = $this->getModelPage()[$message];
        $_SESSION['userId'] = $this->getId();
        if(isset($this->getFile()[$this->getId()]['Branches']))
            $_SESSION['staticId'] = $this->getId();
        else
            foreach ($this->getFile() as $key => $obj)
                if(isset($obj['Branches']) && in_array($this->getId(), array_keys($obj['Branches']))){
                    $_SESSION['staticId'] = $key;
                    break;
                }

        $this->showMessageHome($message);
    }
    static function getRandomKey(){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2) . substr(uniqid(), -6);
    }
    function getModel2(){
        return $this->getObj()[$this->getLanguage()];
    }
    function getModelPage(){
        return $this->getObj()[$this->getLanguage()][$this->getUrlName2()];
    }
    function getLanguage(){
        return $this->Language;
    }
    function getUrlName2(){
        return $this->IdPage;
    }
    static function getFileName(){
        return pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'index'?'Home':pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'];
    }
    function getBackPage(){
        if($this->getUrlName2() === 'SystemLang' && isset($_SERVER['HTTP_REFERER']) && preg_match('/SystemLang/',pathinfo($_SERVER['HTTP_REFERER'])['filename']))
            return ucfirst(pathinfo($_SERVER['HTTP_REFERER'])['filename']);
        else
            return isset($this->getModel2()['MyFlexTables'][$this->getUrlName2()])?('MyFlexTables?id='.$this->getUrlName2()):$this->getUrlName2();
    }
    function getFile(){
        return $this->File;
    }
    function saveVarFile($file){
        $this->File = $file;
    }
    function saveMyFile(){
        file_put_contents("data.json", json_encode($this->getFile(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
    function saveFile($file){
        $this->File = $file;
        file_put_contents("data.json", json_encode($file, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
    function getObj(){
        return $this->File[$this->getId()];
    }
    function getBranch(){
        if(isset($_SESSION['userId']))
            return $this->File[$this->getFixedId()]['Branches'];
        else
            foreach ($this->getFile() as $key => $obj)
                if(isset($obj['Branches']) && in_array($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])?$_GET['id']:$this->getId(), array_keys($obj['Branches'])))
                    return $obj['Branches']; 
    }
    function getBranch2(){
        $myBranch = $this->getBranch();
        unset($myBranch[$this->getId()]);
        return $myBranch;
    }
    function getFileByFixedId(){
        return $this->File[$this->getFixedId()];
    }
    function saveModel($data){
        $this->File[$this->getId()] = $data;
        file_put_contents("data.json", json_encode($this->File, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
    function getFixedId(){
        return $_SESSION['staticId'];
    }
    function getId(){
        return $this->MyIdDb;
        // return (isset($_SESSION['userId'])?$_SESSION['userId']:($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id']) && isset($this->getFile()[$_GET['id']])?$_GET['id']:(isset($_COOKIE['branchId']) && isset($this->getFile()[$_COOKIE['branchId']])?$_COOKIE['branchId']:'admin')));
    }
    function showError($error){
        $_SESSION['error'] = $error;
        header('Location:'.$this->getBackPage());
        exit;
    }
    function showMessage($message){
        $_SESSION['message'] = $message;
        header('Location:'.$this->getBackPage());
        exit;
    }
    function showMessageHome($message){
        $_SESSION['message'] = $message;
        header('Location:index');
        exit;
    }

    //----------------------------------------------------information page

    private $Title;
    private $Message;
    private $Type;
    private $styleLangAction;

    private $ChangeLang;
    private $ModelTitle;
    private $ModelButton;
    private $MyLanguage;

    private $ChangeStyle;
    private $ModalTitleStyle;
    private $ModalButtonStyle;
    private $Style;

    private $ActiveBranch;
    private $ChangeTitleBranch;
    private $ChangeButtonBranch;
    private $StyleFile;
     function getStyleFile(){
        return $this->StyleFile;
    }
    function getActiveBranch(){
        return $this->ActiveBranch;
    }
    function getChangeTitleBranch(){
        return $this->ChangeTitleBranch;
    }
    function getChangeButtonBranch(){
        return $this->ChangeButtonBranch;
    }
    function getMyBranch(){
        return Branch::fromArray($this->getBranch(), $this->getModel2()['Branches']['SelectBranchBox']);
    }
    function getMyLanguage(){
        return $this->MyLanguage;
    }
    function getStyle(){
        return $this->Style;
    }
    function getModalButtonStyle(){
        return $this->ModalButtonStyle;
    }
    function getModalTitleStyle(){
        return $this->ModalTitleStyle;
    }
    function getModelButton(){
        return $this->ModelButton;
    }
    function getModelTitle(){
        return $this->ModelTitle;
    }
    function getChangeLang(){
        return $this->ChangeLang;
    }
    function getChangeStyle(){
        return $this->ChangeStyle;
    }

    function getMessage(){
        return $this->Message;
    }
    function getType(){
        return $this->Type;
    }
    function getActionStyleLang(){
        return $this->styleLangAction;
    }
    function setActionStyleLang($value){
        $this->styleLangAction = $value;
    }

    function getTitle(){
        return $this->Title;
    }
    function setTitle($title){
        return $this->Title = $title;
    }

    //--------------------------------------admin menu
        private $Offcanvas;
    private $Logout;
    private $AdminDashboard;
    private $myMenuApp;
    private $Ssearch;
    private $ZeroRecords;
    private $LengthMenu;
    private $Info;
    private $InfoEmpty;
    private $InfoFiltered;
    private $ScreenModelEdit;
    private $ButtonModelEdit;
    private $TableId;
    private $TabelEvent;
    private $AllBranches;
    private $keysTable;
    private $DataView;
    private $ScreenModelDelete;
    private $messageModelDelete;
    private $buttonModelDelete;
    function getScreenModelDelete(){
        return $this->ScreenModelDelete;
    }
    function getmessageModelDelete(){
        return $this->messageModelDelete;
    }
    function getbuttonModelDelete(){
        return $this->buttonModelDelete;
    }
    function getKeysTable(){
        return $this->keysTable;
    }
    function getAllBranches(){
        return $this->AllBranches;
    }
    function getMyDataView(){
        return $this->DataView;
    }
    function printTableNames(){
        foreach ($this->getKeysTable() as $index => $key)
            echo'<th>'.($this->getModelPage()[$key]??$this->getModelPage()['TableHead'][$key]).'</th>';
    }

    function getIconByKey($key){
        if($key === 'Home')
            return 'fa fa-home';
        else if($key === 'SystemLang')
                return 'fa fa-gear';  
        else if($key === 'ChangeLanguage')
            return 'fa fa-language';
        else if($key === 'Branches')
            return 'fa fa-tree';
        else if($key === 'Login')
            return 'fa fa-lock';
        else if($key === 'Register')
            return 'fa fa-user-plus';
        else if($key === 'Menu')
            return 'fa fa-bars';

        else if($key === 'AllNamesLanguage')
            return 'fa fa-globe';
        else if($key === 'Users')
            return 'fa fa-user';
        else if($key === 'Product')
            return 'fa fa-tag';
        else if($key === 'Site')
            return 'fa fa-truck';
        else if($key === 'MyStyle')
            return 'fa fa-magic';
        else if($key === 'MyFlexTables')
            return 'fa fa-table';
        else if($key === 'Style')
            return 'fa fa-magic';
        else if($key === 'contact')
            return 'fa fa-info';
        else if($key === 'project')
            return 'fa fa-tag';
        else if($key === 'about')
            return 'fa fa-truck';
        else if($key === 'Logout')
            return 'fa fa-archive';
        else if(isset($this->getModel2()['MyFlexTables'][$key]))
            return 'fa fa-table';
        else if(isset($this->getModel2()['AllNamesLanguage'][$key]))
            return 'fa fa-language';
        else
            return 'fa fa-inbox';
    }
    function getScreenModelEdit(){
        return $this->ScreenModelEdit;
    }
    function getButtonModelEdit(){
        return $this->ButtonModelEdit;
    }
    function getTableId(){
        return $this->TableId;
    }
    function getTabelEvent(){
        return $this->TabelEvent;
    }
    function getSsearch(){
        return $this->Ssearch;
    }
    function getZeroRecords(){
        return $this->ZeroRecords;
    }
    function getLengthMenu(){
        return $this->LengthMenu;
    }
    function getInfo(){
        return $this->Info;
    }
    function getInfoEmpty(){
        return $this->InfoEmpty;
    }
    function getInfoFiltered(){
        return $this->InfoFiltered;
    }
    function getMyMenuApp(){
        return $this->myMenuApp;
    }
    function getOffcanvas(){
        return $this->Offcanvas;
    }
    function getAdminDashboard(){
        return $this->AdminDashboard;
    }
    //---------------------------------------------login register

    private $TitleForm;
    private $ButtonName;
    private $dbKeys;
    private $dbBranchKeys;
    private $DbKeyLabel;
    private $AppLabel;
    private $AllBranch;
    private $ModalTitleProject;
    private $ModalButtonProject;
    private $ButtonSetupProject;
    private $RegisterLoginPage;

    private $BranchLabel;
    private $ChangeStyleButton;
    private $ChangeLanguageButton;
    private $BranchProjectTitle;
    private $BranchProjectButton;
    private $ActiveBranchProject;
    function getActiveBranchProject(){
        return $this->ActiveBranchProject;
    }
    function getBranchProjectTitle(){
        return $this->BranchProjectTitle;
    }
    function getBranchProjectButton(){
        return $this->BranchProjectButton;
    }
    function getBranchLabel(){
        return $this->BranchLabel;
    }
    function getChangeStyleButton(){
        return $this->ChangeStyleButton;
    }
    function getChangeLanguageButton(){
        return $this->ChangeLanguageButton;
    }

    function getModalTitleProject(){
        return $this->ModalTitleProject;
    }
    function getModalButtonProject(){
        return $this->ModalButtonProject;
    }
    function getButtonSetupProject(){
        return $this->ButtonSetupProject;
    }
    function getAllBranch(){
        return $this->AllBranch;
    }
    function getAppLabel(){
        return $this->AppLabel;
    }
    function getDbKeys(){
        return $this->dbKeys;
    }
    function getDbBranchKeys(){
        return $this->dbBranchKeys;
    }
    function getRegisterLoginPage(){
        return $this->RegisterLoginPage;
    }

    function getDbKeyLabel(){
        return $this->DbKeyLabel;
    }
    function getTitleForm(){
        return $this->TitleForm;
    }
    function getButtonName(){
        return $this->ButtonName;
    }
    //------------------valid id

    protected $keyId;
    function deleteItem($myData){
        if(count($myData[$this->getUrlName2()]) === 1)
            unset($myData[$this->getUrlName2()]);
        else
            unset($myData[$this->getUrlName2()][$_POST['id']]);
        return $myData;
    }

}
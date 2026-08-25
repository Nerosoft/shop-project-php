<?php
session_start();
include 'interface/InterfaceDataView.php';
abstract class ModelJson implements InterfaceDataView{
    private $File;
    private $IdPage;
    private $Language;
    protected $count = 1;
    private $MyIdDb;
    public $myMenuApp;
    private $keysTable;
    protected $keyId;
    private $MessageServer;
    private $MessageType;
    private $StyleFile;
    public $keysInput;
    function getMyDataViewProduct(){
        return isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
    }
    function getBranchLanguage(){
        $arr = array();
        foreach ($this->getBranch() as $key => $value){
            $arr[$key]['Name'] = $value['Name'];
            $arr[$key]['lang'] = $this->getFile()[$key]['english']['AllNamesLanguage'];
        }
        return $arr;
    }
    function deleteLanguage($myData){
        //delete language
        unset($myData[$this->keyId]);
        //check if branch active language
        if($myData['AllNamesLanguage'] === $this->keyId)
            $myData['AllNamesLanguage'] = 'english';
        foreach ($myData[$myData['AllNamesLanguage']]['AllNamesLanguage'] as $key=>$value)
            //delete name language inside AllNamesLanguage inside my language
            if($key !== $this->keyId)
                unset($myData[$key]['AllNamesLanguage'][$this->keyId]);
        return $myData;
    }
    function changeLangStylePost($myData){
        $myData[$_POST['state']] = $this->keyId;
        return $myData;
    }
    function saveFlexTable($myData, $keysInput, $idSseion){
        foreach ($keysInput as $key => $value)
            $myData[$this->getUrlName2()][$this->keyId][$key] = $_POST[$key];
        $this->saveProductTable($idSseion);
        return $myData;
    }
    function saveFelxTable($AllNamesLanguage, $myData){
        foreach ($AllNamesLanguage as $code => $value) {
            $myData[$code]['MyFlexTables'][$this->keyId] = $_POST['name'];
            $myData[$code][$this->keyId] = $myData[$code]['Home']['TablePage'];
            $myData[$code][$this->keyId]['MYTITLE'] = $_POST['name'];
            foreach ($this->keysInput as $key2 => $myInputKey){
                $myData[$code][$this->keyId]['TableHead'][$myInputKey] = $myData[$code]['Home']['InputNameTable'];
                $myData[$code][$this->keyId]['Label'][$myInputKey] = $myData[$code]['Home']['InputLabel'];
                $myData[$code][$this->keyId]['Hint'][$myInputKey] = $myData[$code]['Home']['InputHint'];
                $myData[$code][$this->keyId]['ErrorsMessageReq'][$myInputKey] = $myData[$code]['Home']['InputErrorsMessageReq'];
                $myData[$code][$this->keyId]['ErrorsMessageInv'][$myInputKey] = $myData[$code]['Home']['InputErrorsMessageInv'];
            }
        }
        return $myData;
    }
    function deleteHome($myData, $idSseion){
        foreach ($myData[$myData['AllNamesLanguage']]['AllNamesLanguage'] as $key => $value)
            if(count($myData[$key]['MyFlexTables']) === 1)
                unset($myData[$key][$this->keyId], $myData[$key]['MyFlexTables']);
            else
                unset($myData[$key][$this->keyId], $myData[$key]['MyFlexTables'][$this->keyId]);
        
        if(isset($myData[$this->keyId])){
            foreach ($myData[$this->keyId] as $key => $value)
                array_map('unlink', glob('asset/product/'.$idSseion.'/'.$key.'.*'));
            unset($myData[$this->keyId]);
        }
        return $myData;
    }
    function saveProduct($myData, $idSseion){
        $myData['Product'][$this->keyId] = array("Name"=>$_POST["name"], "Descreption"=>$_POST["descreption"], "Salary"=>$_POST["salary"], "Category"=>$_POST["category"]);
        $this->saveProductTable($idSseion);
        return $myData;
    }
    function editHome($myData, $AllNamesLanguage){
        foreach ($AllNamesLanguage as $code => $value) 
            $myData[$code]['MyFlexTables'][$this->keyId] = $_POST['name'];
        return $myData;
    }
    function getAllKeyPage(){
        $keys = $this->getModel2();
        unset($keys['AllNamesLanguage'], $keys['Style'], $keys['MyFlexTables'], $keys['Login'], $keys['Register']);
        return array_keys($keys);
    }
    function __construct($idPage = null, $pram1 = null){
        //receve message from constractor felexbalty change key message for all action
        $this->File = json_decode(file_get_contents('data.json'), true);
        $this->IdPage = $idPage??($_GET['id']??null);
        $this->MyIdDb = (isset($_SESSION['userId'])?$_SESSION['userId']:(isset($_COOKIE['branchId']) && isset($this->getFile()[$_COOKIE['branchId']])?$_COOKIE['branchId']:'admin'));
        // $this->MyIdDb = (isset($_SESSION['userId'])?$_SESSION['userId']:($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id']) && isset($this->getFile()[$_GET['id']])?$_GET['id']:(isset($_COOKIE['branchId']) && isset($this->getFile()[$_COOKIE['branchId']])?$_COOKIE['branchId']:'admin')));
        $this->Language = !isset($_SESSION['userId']) && isset($_COOKIE[$this->getId().'AllNamesLanguage']) && isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']])?$_COOKIE[$this->getId().'AllNamesLanguage']:$this->getObj()['AllNamesLanguage'];
        if(
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'Login' ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'Register'||

            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'Branches' ||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguage' ||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'Home' ||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables' ||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyStyle' ||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'Product' ||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLang' ||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'Users'||

            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'Login' ||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'Register'||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'Branches'||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'ChangeLanguage'||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'Home'||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'MyFlexTables'||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'MyStyle'||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'Product'||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'SystemLang'||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'Users'||
            $_SERVER["REQUEST_METHOD"] !== "GET" && ModelJson::getFileName() === 'Site'||


            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginForgetPasswordPost' ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginPost' ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'RegisterPost' ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject'||

            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'ChangeLangPost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'LoginForgetPasswordPost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'LoginPost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'RegisterPost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'SetupProject'||

            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'BranchChangePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'BranchCreatePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'BranchDeletePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'BranchEditPost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'ChangeLanguageCreatePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'ChangeLanguageDeletePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'ChangeLanguageEditPost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'ChangeLanguagePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'FlexTablesCreatePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'HomeCreatePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'HomeDeletePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'HomeEditPost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'ProductCreatePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'SettingUsersCreatePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'SettingUsersDeletePost'||
            $_SERVER["REQUEST_METHOD"] !== "POST" && ModelJson::getFileName() === 'SystemLangEditPost'||

            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchChangePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchDeletePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchEditPost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'FlexTablesCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeDeletePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeEditPost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ProductCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLangEditPost'||

            !isset($_SESSION['userId']) && isset($_COOKIE['branchId']) && !isset($this->getFile()[$_COOKIE['branchId']])||
            // !isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id']) && !isset($this->getFile()[$_GET['id']])||
            !isset($_SESSION['userId']) && isset($_COOKIE[$this->getId().'AllNamesLanguage']) && !isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']])||
            !isset($_SESSION['userId']) && isset($_COOKIE[$this->getId().'Style']) && !isset($this->getModel2()['Style'][$_COOKIE[$this->getId().'Style']])||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && !isset($_POST['state'])||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && !isset($_GET['id'])||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] !== 'AllNamesLanguage' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'branch' && $_POST['state'] !== 'branch2'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && 
            $_GET['id'] !== 'Login' && 
            $_GET['id'] !== 'Register' && 
            $_GET['id'] !== 'Site'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject' && !isset($_GET['id'])||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject' && 
            $_GET['id'] !== 'Login' && 
            $_GET['id'] !== 'Register'||
            
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLang' && isset($_GET['lang']) && isset($_GET['table']) && !isset($this->getObj()[$_GET['lang']][$_GET['table']])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLang' && isset($_GET['lang']) && !isset($_GET['table'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLang' && isset($_GET['table']) && !isset($_GET['lang'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables' && !isset($this->getModel2()['MyFlexTables'][$_GET['id']]) ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($this->getModel2()['MyFlexTables'][$_GET['id']??'']) ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && $_GET['id'] !== 'Users' && $_GET['id'] !== 'Product' && !isset($this->getModel2()['MyFlexTables'][$_GET['id']])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchChangePost' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchChangePost' &&
            !in_array($_GET['id'], $this->getAllKeyPage())||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && $_GET['id'] !== 'ChangeLanguage' && $_GET['id'] !== 'MyStyle'||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && 
            !in_array($_GET['id'], $this->getAllKeyPage())||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($_POST['state'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'AllNamesLanguage'){
            if(!isset($_SESSION['userId']) && isset($_COOKIE['branchId']) && !isset($this->getFile()[$_COOKIE['branchId']]))
                setcookie('branchId', '', time()-3600);
            else if(!isset($_SESSION['userId']) && isset($_COOKIE[$this->getId().'AllNamesLanguage']) && !isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']]))
                setcookie($this->getId().'AllNamesLanguage', '', time()-3600);
            else if(!isset($_SESSION['userId']) && isset($_COOKIE[$this->getId().'Style']) && !isset($this->getModel2()['Style'][$_COOKIE[$this->getId().'Style']]))
                setcookie($this->getId().'Style', '', time()-3600);
            $_SESSION['error'] = $this->getModel2()[isset($_SESSION['userId'])?'Home':'Login']['ErrorServerMessage'];
            header('Location:'.(isset($_SESSION['userId'])?'Home':'Login'));
            exit;
        }else if($_SERVER["REQUEST_METHOD"] === "GET"){
            $this->MessageServer = $_SESSION['error']??($_SESSION['message']??$this->getModelPage()['LoadMessage']);
            $this->MessageType = isset($_SESSION['error'])?'danger':'success';
            $this->StyleFile = isset($_COOKIE[$this->getId().'Style']) && !isset($_SESSION['userId'])?$_COOKIE[$this->getId().'Style']:$this->getObj()['Style'];
            if(isset($_SESSION['message']) || isset($_SESSION['error']))
                unset($_SESSION['message'], $_SESSION['error']);
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
        }//$_SERVER["REQUEST_METHOD"] === "POST" && important
        else if(ModelJson::getFileName() !== 'LoginForgetPasswordPost' && ModelJson::getFileName() !== 'LoginPost' && ModelJson::getFileName() !== 'SystemLangEditPost'){
            // 'BranchCreatePost'  'ChangeLanguageCreatePost'  'HomeCreatePost'  'SetupProject'  'RegisterPost' 
            $this->keyId = ModelJson::getFileName() === 'BranchCreatePost' ||
            ModelJson::getFileName() === 'ChangeLanguageCreatePost' ||
            ModelJson::getFileName() === 'HomeCreatePost'||
            ModelJson::getFileName() === 'RegisterPost'||
            ModelJson::getFileName() === 'RegisterPost'?ModelJson::getRandomKey():($_POST['id']??ModelJson::getRandomKey());
        }
        $this->keysTable = $pram1;
    }
    function initMenuSettingLang(){
        $this->myMenuApp = array();
        foreach ($this->getModel2()['AllNamesLanguage'] as $key => $value){
            $this->myMenuApp[$key] = array($value);
            foreach (array_keys($this->getModel2()) as $key2 => $table) 
                $this->myMenuApp[$key][$table] = $this?->getModel2()[$table]['MYTITLE']??$this->getModelPage()[$table];
        }
        $this->myMenuApp['Logout'] = $this->getModelPage()['Logout'];
    }
    function makePost(){
        if(ModelJson::getFileName()==='LoginForgetPasswordPost' || ModelJson::getFileName()==='LoginPost' || 
                ModelJson::getFileName() === 'RegisterPost' || ModelJson::getFileName() === 'SetupProject'){
            $this->initErrorsEmailPassword3();
            $this->getView();
            if(ModelJson::getFileName() !== 'SetupProject')
                $this->loginAdmin();
            $this->showMessage('Home');
        }else if(ModelJson::getFileName()==='SystemLangEditPost' && isset($_POST['choices']) && count($this->getModel2()['AllNamesLanguage']) === 1||
        ModelJson::getFileName()!=='SystemLangEditPost' && isset($_POST['choices']) && is_array($_POST['choices']) && isset($_POST['choices'][$this->getId()])|| 
        ModelJson::getFileName()!=='SystemLangEditPost' && isset($_POST['choices']) && count($this->getBranch()) === 1)
            $this->showError($this->getModelPage()['BranchInv']);       
        //valid id first
        else if( ModelJson::getFileName()!=='SystemLangEditPost' && ModelJson::getFileName()!=='BranchCreatePost' && ModelJson::getFileName()!=='FlexTablesCreatePost' && ModelJson::getFileName()!=='HomeCreatePost' && ModelJson::getFileName()!=='ChangeLanguageCreatePost' && ModelJson::getFileName()!=='SettingUsersCreatePost' && ModelJson::getFileName()!=='ProductCreatePost' && !isset($_POST['id']) ||
                ModelJson::getFileName()!=='SystemLangEditPost' && ModelJson::getFileName()!=='BranchCreatePost' && ModelJson::getFileName()!=='FlexTablesCreatePost' && ModelJson::getFileName()!=='HomeCreatePost' && ModelJson::getFileName()!=='ChangeLanguageCreatePost' &&  ModelJson::getFileName()!=='SettingUsersCreatePost' && ModelJson::getFileName()!=='ProductCreatePost' && $_POST['id'] === '')
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
                else if(ModelJson::getFileName() === 'ChangeLanguageDeletePost')
                    $myFile[$key] = $this->deleteLanguage($myFile[$key]);
                else if(ModelJson::getFileName() === 'ChangeLanguageEditPost')
                    $myFile[$key] = $this->saveNameLanguage($myFile[$key][$myFile[$key]['AllNamesLanguage']]['AllNamesLanguage'], $this->getBackPage() === 'MyStyle'?'Style':'AllNamesLanguage', $myFile[$key]);
                else if(ModelJson::getFileName() === 'ChangeLanguagePost')
                    $myFile[$key] = $this->changeLangStylePost($myFile[$key]);
                else if(ModelJson::getFileName() === 'FlexTablesCreatePost')
                    $myFile[$key] = $this->saveFlexTable($myFile[$key], $myFile[$key][$myFile[$key]['AllNamesLanguage']][$this->getUrlName2()]['ErrorsMessageReq'], $key);
                else if(ModelJson::getFileName() === 'HomeCreatePost')
                    $myFile[$key] = $this->saveFelxTable($myFile[$key][$myFile[$key]['AllNamesLanguage']]['AllNamesLanguage'], $myFile[$key]);
                else if(ModelJson::getFileName() === 'HomeDeletePost')
                    $myFile[$key] = $this->deleteHome($myFile[$key], $key);
                else if(ModelJson::getFileName() === 'ChangeLanguageCreatePost'){
                    $myLanguage = $this->getObj()[$_POST['selectedLanguage']];
                    if(isset($myLanguage['MyFlexTables']))
                        foreach ($myLanguage['MyFlexTables'] as $keyFlexTable => $value)
                            unset($myLanguage[$keyFlexTable]);
                    $myFile[$key] = $this->saveNameLanguage($myFile[$key][$myFile[$key]['AllNamesLanguage']]['AllNamesLanguage'], 'AllNamesLanguage', $myFile[$key]);
                    $lang = $myLanguage;
                    //reset all name language 
                    $lang['AllNamesLanguage'] = $myFile[$key][$myFile[$key]['AllNamesLanguage']]['AllNamesLanguage'];
                    //check if exist flex table inside branch
                    if(isset($myFile[$key][$myFile[$key]['AllNamesLanguage']]['MyFlexTables'])){
                        $lang['MyFlexTables'] = $myFile[$key][$myFile[$key]['AllNamesLanguage']]['MyFlexTables'];
                        foreach ($lang['MyFlexTables'] as $keyFlex => $value)
                            $lang[$keyFlex] = $myFile[$key][$myFile[$key]['AllNamesLanguage']][$keyFlex];
                    }
                    //add lang inside branch
                    $myFile[$key][$this->keyId] = $lang;
                }else if(ModelJson::getFileName() === 'ProductCreatePost')
                    $myFile[$key] = $this->saveProduct($myFile[$key], $key);
                else if(ModelJson::getFileName() === 'SettingUsersCreatePost')
                    $myFile[$key] = $this->initErrorsKeyPassword2($myFile[$key]);
                else if(ModelJson::getFileName() === 'HomeEditPost')
                    $myFile[$key] = $this->editHome($myFile[$key], $myFile[$key][$myFile[$key]['AllNamesLanguage']]['AllNamesLanguage']);
                else if(ModelJson::getFileName() === 'SettingUsersDeletePost'){
                    if($this->getUrlName2() !== 'Users')
                        //delete image for product
                        array_map('unlink', glob('asset/product/'.$key.'/'.$this->keyId.'.*'));
                    $myFile[$key] = $this->deleteItem($myFile[$key]);
                }
            $this->saveFile($myFile);
            return;
        }else if(
            ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($this->getModel2()[$_POST['state']][$_POST['id']])||
            ModelJson::getFileName() === 'BranchChangePost' && !isset($this->getBranch()[$_POST['id']])||
            ModelJson::getFileName() === 'BranchDeletePost' && $_POST['id'] === $this->getFixedId()||
            ModelJson::getFileName() === 'BranchDeletePost' && $_POST['id'] === $this->getId()||
            //check lang name = english (system) and = (select language)
            ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_POST['id'] === $this->getLanguage()||
            ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_POST['id'] === 'english'||

            ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] !== 'branch' && $_POST['state'] !== 'branch2' && !isset($this->getModel2()[$_POST['state']][$_POST['id']])||
            ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] === 'branch' && !isset($this->getBranch()[$_POST['id']])||
            ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] === 'branch2' && !isset($this->getFile()[$_POST['id']])||
            
            ModelJson::getFileName() === 'SettingUsersDeletePost' && !isset($this->getObj()[$this->getUrlName2()][$_POST['id']]) ||
            ModelJson::getFileName() === 'ChangeLanguageEditPost' && !isset($this->getModel2()[$this->getUrlName2() === 'MyStyle'?'Style':'AllNamesLanguage'][$_POST['id']])||
            //work getUrlName2 for validation (change delete edit branch, lang home)
            isset($_POST['id']) && $this->getUrlName2() === 'Home' && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && !isset($this->getModel2()['MyFlexTables'][$_POST['id']])||
            isset($_POST['id']) && $this->getUrlName2() === 'Branches' && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && !isset($this->getBranch()[$_POST['id']])||
            isset($_POST['id']) && $this->getUrlName2() === 'ChangeLanguage' && ModelJson::getFileName() !== 'BranchChangePost' && ModelJson::getFileName() !== 'ChangeLanguagePost' && !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() === 'SettingUsersCreatePost' && !isset($this->getObj()['Users'][$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() === 'ProductCreatePost' && !isset($this->getObj()['Product'][$_POST['id']])||
            isset($_POST['id']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !isset($this->getObj()[$this->getUrlName2()][$_POST['id']])
        )
            $this->showError($this->getModelPage()['IdIsInv']);
        
        else if(ModelJson::getFileName() === 'ChangeLanguageEditPost' || ModelJson::getFileName() === 'ChangeLanguageCreatePost')
            $this->validLanguageInput();
        else if(ModelJson::getFileName() === 'HomeCreatePost' || ModelJson::getFileName() === 'HomeEditPost')
            $this->validName();
        else if(ModelJson::getFileName() === 'BranchEditPost' || ModelJson::getFileName() === 'BranchCreatePost')
            $this->initErrorBranch2();
        $this->getView();
    }
    function loginRegister(){
        echo<<<HTML
            <link href="./asset/css/login_register.css" rel="stylesheet"></head><body>
            <div class="container">
                <div id="createModel" class="register">
                    <h4>
        HTML;
        include 'pis_of_page/button_langstylebranch.php';
        echo<<<HTML
                        <a href="./site" class="navbar-brand fa fa-truck fa-2x pointer icon_modal"></a>
                    </h4>
                        <h4>{$this->getTitleForm()}</h4>
                    <form method='POST' action="{$this->getkeysTable()}">
        HTML; 
        $this->initTable('all_modal/login_register_input.php', 'pis_of_page/buttons.php');
    }
    function setupMenu($cont){
        foreach (array_keys($this->getModel2()) as $key2 => $table)
            if(ModelJson::getFileName() === 'Site' && $table === 'Site' && isset($this->getModel2()['MyFlexTables']))
                foreach ($this->getModel2()['MyFlexTables'] as $key => $value)
                    $this->myMenuApp[$key] = $value;
            else if(isset($_SESSION['userId']) && ModelJson::getFileName() !== 'ChangeLanguage' && ModelJson::getFileName() !== 'SystemLang' && $table === 'MyFlexTables' && isset($this->getModel2()['MyFlexTables']))
                $this->myMenuApp['MyFlexTables'] = array($this->getModelPage()['MyFlexTables'], ...$this->getModel2()['MyFlexTables']);
            else if(isset($_SESSION['userId']) && $table === 'Home'||
                isset($_SESSION['userId']) && $table === 'SystemLang'||
                ModelJson::getFileName() === 'SystemLang' && $table === 'ChangeLanguage'||
                ModelJson::getFileName() === 'ChangeLanguage' && $table === 'ChangeLanguage'||
                
                !isset($_SESSION['userId']) && $table === 'Login'||
                !isset($_SESSION['userId']) && $table === 'Register'||

                isset($_SESSION['userId']) && 
                ModelJson::getFileName() !== 'ChangeLanguage' && 
                ModelJson::getFileName() !== 'SystemLang'&&
                !isset($this->getModel2()['MyFlexTables'][$table])&&
                $table !== 'Style' && 
                $table !== 'MyFlexTables' && 
                $table !== 'Login' && 
                $table !== 'Register' && 
                $table !== 'ChangeLanguage' && 
                $table !== 'AllNamesLanguage')
                $this->myMenuApp[$table] = $this->getModel2()[$table]['MYTITLE'];
        $this->myMenuApp['Logout'] = $this->getModelPage()['Logout'];
        echo'<link href="./asset/lib/dataTables.bootstrap5.css" rel="stylesheet">
        <script src="./asset/lib/dataTables.js" type="text/javascript"></script>
        <script src="./asset/lib/dataTables.bootstrap5.js" type="text/javascript"></script></head><body>';
        include 'pis_of_page/admin_title.php';
        echo'<div class="start-page '.$cont.'">';
    }
    function initTable($file = 'pis_of_page/table_colume.php', $file2 = 'pis_of_page/part_table.php'){
        include $file;
        $this->getView();
        include $file2;
        include 'pis_of_page/end_html.php';
        exit;
    }
    function getCount(){
        return $this->count;
    }
    function plusCount(){
        $this->count+=1;
    }
    function loginAdmin(){
        $_SESSION['userId'] = $this->getId();
        if(isset($this->getFile()[$this->getId()]['Branches']))
            $_SESSION['staticId'] = $this->getId();
        else
            foreach ($this->getFile() as $key => $obj)
                if(isset($obj['Branches']) && in_array($this->getId(), array_keys($obj['Branches']))){
                    $_SESSION['staticId'] = $key;
                    break;
                }
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
            return isset($this->getModel2()['MyFlexTables'][$this->getUrlName2()]) || ModelJson::getFileName() === 'HomeCreatePost' && isset($_SESSION['message'])?('MyFlexTables?id='.(ModelJson::getFileName() === 'HomeCreatePost'?$this->keyId:$this->getUrlName2())):$this->getUrlName2();
    }
    function getFile(){
        return $this->File;
    }
    function saveFile($file = null){
        file_put_contents("data.json", json_encode($file??$this->getFile(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
    function getObj(){
        return $this->File[$this->getId()];
    }
    function getBranch(){
        if(isset($_SESSION['userId']))
            return $this->File[$this->getFixedId()]['Branches'];
        else
            foreach ($this->getFile() as $key => $obj)
                // if(isset($obj['Branches']) && in_array($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])?$_GET['id']:$this->getId(), array_keys($obj['Branches'])))
                if(isset($obj['Branches']) && in_array($this->getId(), array_keys($obj['Branches'])))
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
    }
    function showError($error){
        $_SESSION['error'] = $error;
        header('Location:'.$this->getBackPage());
        exit;
    }
    function showMessage($page = null){
        $_SESSION['message'] = $this->getModelPage()[$this->getKeysTable()];
        header('Location:'.($page??$this->getBackPage()));
        exit;
    }
    function getStyleFile(){
        return $this->StyleFile;
    }
    function getActiveBranch(){
        return $this->getModelPage()['ActiveBranch'];
    }
    function getChangeTitleBranch(){
        return $this->getModelPage()['ChangeTitleBranch'];
    }
    function getChangeButtonBranch(){
        return $this->getModelPage()['ChangeButtonBranch'];
    }
    function getMyBranch(){
        return Branch::fromArray($this->getBranch(), $this->getModel2()['Branches']['SelectBranchBox']);
    }
    function getMyLanguage(){
        return MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']);
    }
    function getStyle(){
        return MyLanguage::fromArray($this->getModel2()['Style']);
    }
    function getModalButtonStyle(){
        return $this->getModelPage()['ModalButtonStyle'];
    }
    function getModalTitleStyle(){
        return $this->getModelPage()['ModalTitleStyle'];
    }
    function getModelButton(){
        return $this->getModelPage()['ModelButton'];
    }
    function getModelTitle(){
        return $this->getModelPage()['ModelTitle'];
    }
    function getChangeLang(){
        return $this->getModelPage()['UsedLanguage'];
    }
    function getChangeStyle(){
        return $this->getModelPage()['UsedStyle'];
    }
    function getMessage(){
        return $this->MessageServer;
    }
    function getType(){
        return $this->MessageType;
    }
    function getTitle(){
        return $this->getModelPage()['Title'];
    }
    function getScreenModelDelete(){
        return $this->getModelPage()['ScreenModelDelete'];
    }
    function getmessageModelDelete(){
        return $this->getModelPage()['MessageModelDelete'];
    }
    function getbuttonModelDelete(){
        return $this->getModelPage()['ButtonModelDelete'];
    }
    function getAllBranches(){
        return $this->getModelPage()['AllBranches'];
    }
    function getKeysTable(){
        return $this->keysTable;
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
        return $this->getModelPage()['ScreenModelEdit'];
    }
    function getButtonModelEdit(){
        return $this->getModelPage()['ButtonModelEdit'];
    }
    function getSsearch(){
        return $this->getModelPage()['Ssearch'];
    }
    function getZeroRecords(){
        return $this->getModelPage()['ZeroRecords'];
    }
    function getLengthMenu(){
        return $this->getModelPage()['LengthMenu'];
    }
    function getInfo(){
        return $this->getModelPage()['Info'];
    }
    function getInfoEmpty(){
        return $this->getModelPage()['InfoEmpty'];
    }
    function getInfoFiltered(){
        return $this->getModelPage()['InfoFiltered'];
    }
    function getMyMenuApp(){
        return $this->myMenuApp;
    }
    function getOffcanvas(){
        return $this->getModelPage()['Offcanvas'];
    }
    function getAdminDashboard(){
        return $this->getModelPage()['AdminDashboard'];
    }
    function getActiveBranchProject(){
        return $this->getModelPage()['ActiveBranchProject'];
    }
    function getBranchProjectTitle(){
        return $this->getModelPage()['BranchProjectTitle'];
    }
    function getBranchProjectButton(){
        return $this->getModelPage()['BranchProjectButton'];
    }
    function getBranchLabel(){
        return $this->getModelPage()['BranchLabel'];
    }
    function getChangeStyleButton(){
        return $this->getModelPage()['ChangeStyleButton'];
    }
    function getChangeLanguageButton(){
        return $this->getModelPage()['ChangeLanguageButton'];
    }
    function getModalTitleProject(){
        return $this->getModelPage()['ModalTitleProject'];
    }
    function getModalButtonProject(){
        return $this->getModelPage()['ModalButtonProject'];
    }
    function getButtonSetupProject(){
        return $this->getModelPage()['ButtonSetupProject'];
    }
    function getAllBranch(){
        return $this->getModelPage()['AllBranch'];
    }
    function getAppLabel(){
        return $this->getModelPage()['AppLabel'];
    }
    function getRegisterLoginPage(){
        return $this->getModelPage()['RegisterLoginPage'];
    }
    function getDbKeyLabel(){
        return $this->getModelPage()['DbKeyLabel'];
    }
    function getTitleForm(){
        return $this->getModelPage()['TitleForm'];
    }
    function getButtonName(){
        return $this->getModelPage()['ButtonName'];
    }
    function deleteItem($myData){
        if(count($myData[$this->getUrlName2()]) === 1)
            unset($myData[$this->getUrlName2()]);
        else
            unset($myData[$this->getUrlName2()][$_POST['id']]);
        return $myData;
    }

    //all trait function
    //ChangeStyleLangBranch
    function getLabelChangeLanguageMessage(){
        return $this->getModelPage()['LabelChangeLanguageMessage'];
    }
    function getTitleChangeLanguageMessage(){
        return $this->getModelPage()['TitleChangeLanguageMessage'];
    }
    function getButtonChangeLanguageMessage(){
        return $this->getModelPage()['ButtonChangeLanguageMessage'];
    }
    //ErrorBranch
    function validInputs(){
        if(!isset($_POST['Name']) || $_POST['Name'] === '')
            $this->showError($this->getBranceRaysNameRequired());
        else if(strlen($_POST['Name']) < 3)
            $this->showError($this->getBranceRaysNameLength());
        else if(!isset($_POST['Phone']) || $_POST['Phone'] === '')
            $this->showError($this->getBranceRaysPhoneRequired());
        else if(!preg_match('/^[0-9]{11}$/', $_POST['Phone']))
            $this->showError($this->getBranceRaysPhoneLength());
        else if(!isset($_POST['Country']) || $_POST['Country'] === '')
            $this->showError($this->getBranceRaysCountryRequired());
        else if(strlen($_POST['Country']) < 3)
            $this->showError($this->getBranceRaysCountryLength());
        else if(!isset($_POST['Governments']) || $_POST['Governments'] === '')
            $this->showError($this->getBranceRaysGovernmentsRequired());
        else if(strlen($_POST['Governments']) < 3)
            $this->showError($this->getBranceRaysGovernmentsLength());
        else if(!isset($_POST['City']) || $_POST['City'] === '')
            $this->showError($this->getBranceRaysCityRequired());
        else if(strlen($_POST['City']) < 3)
            $this->showError($this->getBranceRaysCityLength());
        else if(!isset($_POST['Street']) || $_POST['Street'] === '')
            $this->showError($this->getBranceRaysStreetRequired());
        else if(strlen($_POST['Street']) < 3)
            $this->showError($this->getBranceRaysStreetLength());
        else if(!isset($_POST['Building']) || $_POST['Building'] === '')
            $this->showError($this->getBranceRaysBuildingRequired());
        else if(strlen($_POST['Building']) < 3)
            $this->showError($this->getBranceRaysBuildingLength());
        else if(!isset($_POST['Address']) || $_POST['Address'] === '')
            $this->showError($this->getBranceRaysAddressRequired());
        else if(strlen($_POST['Address']) < 3)
            $this->showError($this->getBranceRaysAddressLength());
        else if(!isset($_POST['Follow']))
            $this->showError($this->getBranceRaysFollowRequired());
        else if(!isset($this->getModelPage()['SelectBranchBox'][$_POST['Follow']]))
            $this->showError($this->getModelPage()['BranceRaysFollowValue']);
        else if(ModelJson::getFileName() === 'BranchCreatePost' && !isset($_POST['selectedBranch']))
            $this->showError($this->getModelPage()['IdBranchReq']);
        else if(ModelJson::getFileName() === 'BranchCreatePost' && !isset($this->getBranch()[$_POST['selectedBranch']]))
            $this->showError($this->getModelPage()['IdBranchInv']);
    }
    function initErrorBranch2(){
        $this->validInputs();
        $myBranch = $this->getFile();
        $myBranch[$this->getFixedId()]['Branches'][$this->keyId] = array(
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
        $this->File = $myBranch;
    }
    function getBranceRaysNameRequired(){
        return $this->getModelPage()['BranceRaysNameRequired'];
    }
    function getBranceRaysPhoneRequired(){
        return $this->getModelPage()['BranceRaysPhoneRequired'];
    }
    function getBranceRaysGovernmentsRequired(){
        return $this->getModelPage()['BranceRaysGovernmentsRequired'];
    }
    function getBranceRaysCityRequired(){
        return $this->getModelPage()['BranceRaysCityRequired'];
    }
    function getBranceRaysStreetRequired(){
        return $this->getModelPage()['BranceRaysStreetRequired'];
    }
    function getBranceRaysBuildingRequired(){
        return $this->getModelPage()['BranceRaysBuildingRequired'];
    }
    function getBranceRaysAddressRequired(){
        return $this->getModelPage()['BranceRaysAddressRequired'];
    }
    function getBranceRaysCountryRequired(){
        return $this->getModelPage()['BranceRaysCountryRequired'];
    }
    function getBranceRaysFollowRequired(){
        return $this->getModelPage()['BranceRaysFollowRequired'];
    }
    function getBranceRaysNameLength(){
        return $this->getModelPage()['BranceRaysNameLength'];
    }
    function getBranceRaysPhoneLength(){
        return $this->getModelPage()['BranceRaysPhoneLength'];
    }
    function getBranceRaysGovernmentsLength(){
        return $this->getModelPage()['BranceRaysGovernmentsLength'];
    }
    function getBranceRaysCityLength(){
        return $this->getModelPage()['BranceRaysCityLength'];
    }
    function getBranceRaysStreetLength(){
        return $this->getModelPage()['BranceRaysStreetLength'];
    }
    function getBranceRaysBuildingLength(){
        return $this->getModelPage()['BranceRaysBuildingLength'];
    }
    function getBranceRaysAddressLength(){
        return $this->getModelPage()['BranceRaysAddressLength'];
    }
    function getBranceRaysCountryLength(){
        return $this->getModelPage()['BranceRaysCountryLength'];
    }
    //ErrorChangelanguage
    function getallNames(){
        return $this->getModel2()['AllNamesLanguage'];
    }
    function getNewLangNameRequired(){
        return $this->getModelPage()['NewLangNameRequired'];
    }
    function getNewLangNameInvalid(){
        return $this->getModelPage()['NewLangNameInvalid'];
    }
    function saveNameLanguage($name, $nameKey, $myData){
        foreach ($name as $key=>$value)
            $myData[$key][$nameKey][$this->keyId] = $_POST['lang_name'];
        return $myData;
    }
    function validLanguageInput(){
        if(!isset($_POST['lang_name']) || $_POST['lang_name'] === '')
            $this->showError($this->getNewLangNameRequired());
        else if(strlen($_POST['lang_name']) < 3)
            $this->showError($this->getNewLangNameInvalid());
        else if(ModelJson::getFileName() === 'ChangeLanguageCreatePost' && !isset($_POST['selectedLanguage']))
            $this->showError($this->getModelPage()['LanguageReq']);
        else if(ModelJson::getFileName() === 'ChangeLanguageCreatePost' && !isset($this->getallNames()[$_POST['selectedLanguage']]))
            $this->showError($this->getModelPage()['LanguageInv']);
    }
    //ImgInfo
    function validMyImage(){
        //delete input
        if(!isset($_FILES['avatar']))
           $this->showError($this->getReqimage());
        else if(!isset($_POST['id']) && !is_uploaded_file($_FILES['avatar']['tmp_name']))
            $this->showError($this->getModelPage()['UploadImgInv']);
        else if(is_uploaded_file($_FILES['avatar']['tmp_name']) && 
        strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)) !== 'jpg' &&
        strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)) !== 'png'||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] > (2 * 1024 * 1024)||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] < 2000||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && !getimagesize($_FILES['avatar']['tmp_name']))
           $this->showError($this->getInvimage());
    }
    function saveProductTable($idSseion){
        if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']) && is_dir('asset/product/'.$idSseion))
            copy($_FILES['avatar']['tmp_name'], 'asset/product/'.$idSseion.'/'.$this->keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        else if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']) && is_dir('asset/product')){
            mkdir('asset/product/'.$idSseion);
            copy($_FILES['avatar']['tmp_name'], 'asset/product/'.$idSseion.'/'.$this->keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        }
        else if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])){
            mkdir('asset/product');
            mkdir('asset/product/'.$idSseion);
            copy($_FILES['avatar']['tmp_name'], 'asset/product/'.$idSseion.'/'.$this->keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        }
    }
    function getReqimage(){
        return $this->getModelPage()['Reqimage'];
    }
    function getInvimage(){
        return $this->getModelPage()['Invimage'];
    }
    //TableProductImage use ImgInfo
    function getTitleViewImage(){
        return $this->getModelPage()['TitleViewImage'];
    }
    function getImgLabel(){
        return $this->getModelPage()['ImgLabel'];
    }
    function getImgButton(){
        return $this->getModelPage()['ImgButton'];
    }
    // ErrorFlexTable use TableProductImage
    function initErrorFlexTable2(){
        $this->validMyImage();
        foreach ($this->getErrorsMessageReq() as $key => $value)
            if(!isset($_POST[$key]) || $_POST[$key] === '')
                $this->showError($this->getErrorsMessageReq()[$key]);
            else if(strlen($_POST[$key]) < 3)
                $this->showError($this->getErrorsMessageInv()[$key]);
    }
    function getErrorsMessageReq(){
        return $this->getModelPage()['ErrorsMessageReq'];
    }
    function getErrorsMessageInv(){
        return $this->getModelPage()['ErrorsMessageInv'];
    }
    //ErrorProduct use TableProductImage
    function validProductInput(){
        $this->validMyImage();
        if(!isset($_POST['name']) || $_POST['name'] === '')
           $this->showError($this->getRequiredName());
        else if(strlen($_POST['name']) < 3)
           $this->showError($this->getInvalidName());
        else if(!isset($_POST['descreption']) || $_POST['descreption'] === '')
           $this->showError($this->getRequiredDescreption());
        else if(strlen($_POST['descreption']) < 8)
           $this->showError($this->getInvalidDescreption());
        else if(!isset($_POST['salary']) || $_POST['salary'] === '')
           $this->showError($this->getRequiredSalary());
        else if(!is_numeric($_POST['salary']) || $_POST['salary'] > 1000000)
           $this->showError($this->getInvalidSalary());
        else if(!isset($_POST['category']) || $_POST['category'] === '')
           $this->showError($this->getRequiredCategory());
        else if(strlen($_POST['category']) < 3)
           $this->showError($this->getInvalidCategory());
    }
    function getRequiredName(){
        return $this->getModelPage()['RequiredName'];
    }
    function getRequiredDescreption(){
        return $this->getModelPage()['RequiredDescreption'];
    }
    function getRequiredSalary(){
        return $this->getModelPage()['RequiredSalary'];
    }
    function getRequiredCategory(){
        return $this->getModelPage()['RequiredCategory'];
    }
    function getInvalidName(){
        return $this->getModelPage()['InvalidName'];
    }
    function getInvalidDescreption(){
        return $this->getModelPage()['InvalidDescreption'];
    }
    function getInvalidSalary(){
        return $this->getModelPage()['InvalidSalary'];
    }
    function getInvalidCategory(){
        return $this->getModelPage()['InvalidCategory'];
    }
    //ErrorRegister
    function initErrorsRegister2(){
        if(!isset($_POST['password_confirmation']) || $_POST['password_confirmation'] === '')
            $this->showError($this->getRequiredConfirmPassword());
        else if(strlen($_POST['password_confirmation']) < 8)
            $this->showError($this->getInvalidConfirmPassword());
        else if($_POST['Password'] !== $_POST['password_confirmation'])
            $this->showError($this->getPasswordDosNotMatch());
    }
    function getPasswordDosNotMatch(){
        return $this->getModelPage()['PasswordDosNotMatch'];
    }
    function getRequiredConfirmPassword(){
        return $this->getModelPage()['RequiredConfirmPassword'];
    }
    function getInvalidConfirmPassword(){
        return $this->getModelPage()['InvalidConfirmPassword'];
    }
    //ErrorsEmailPassword
    function initErrorsEmailPassword3(){
        if(!isset($_POST['Email']) || $_POST['Email'] === '')
            $this->showError($this->getRequiredEmail());
        else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
            $this->showError($this->getInvalidEmail());
        else if(!isset($_POST['Password']) || $_POST['Password'] === '')
            $this->showError($this->getRequiredPassword());
        else if(strlen($_POST['Password']) < 8)
            $this->showError($this->getInvalidPassword());
        else if(ModelJson::getFileName() !== 'LoginPost' && !isset($_POST['Key']) || ModelJson::getFileName() !== 'LoginPost' && $_POST['Key'] === '')
                $this->showError($this->getRequiredKeyPassword());
        else if(ModelJson::getFileName() !== 'LoginPost' && strlen($_POST['Key']) < 8)
            $this->showError($this->getInvalidKeyPassword());
    }
    function initErrorsKeyPassword2($myData){
       if(isset($myData['Users'][$this->keyId]['Email']) && $_POST['Email'] === $myData['Users'][$this->keyId]['Email'] ||
            //make edit create account and check exist email
            isset($myData['Users']) && !in_array($_POST['Email'], array_map(function($user) {return $user['Email'];}, $myData['Users']))||
            //check users empty
            !isset($myData['Users'])){
                $myData['Users'][$this->keyId] = array("Email"=>$_POST["Email"], "Password"=>$_POST["Password"], "Key"=>$_POST["Key"]);
                return $myData;
            //show message email exist
        }else
            $this->showError($this->getModelPage()['EmailExist']);
        
    }
    function getRequiredKeyPassword(){
        return  $this->getModelPage()['RequiredKeyPassword'];
    }
    function getInvalidKeyPassword(){
        return $this->getModelPage()['InvalidKeyPassword'];
    }
    function getRequiredEmail(){
        return $this->getModelPage()['RequiredEmail'];
    }
    function getInvalidEmail(){
        return $this->getModelPage()['InvalidEmail'];
    }
    function getRequiredPassword(){
        return $this->getModelPage()['RequiredPassword'];
    }
    function getInvalidPassword(){
        return $this->getModelPage()['InvalidPassword'];
    }
    //ErrorsHome
    function validName(){
        if(!isset($_POST['name']) || $_POST['name'] === '')
            $this->showError($this->getNameTableIsReq());
        else if(strlen($_POST['name']) < 3)
            $this->showError($this->getModelPage()['NameTableIsReq']);
        else if(ModelJson::getFileName() === 'HomeCreatePost' && !isset($_POST['input_number']) || ModelJson::getFileName() === 'HomeCreatePost' && $_POST['input_number'] === '')
            $this->showError($this->getInputNumberTableIsReq());
        else if(ModelJson::getFileName() === 'HomeCreatePost' && !is_numeric($_POST['input_number']) || ModelJson::getFileName() === 'HomeCreatePost' && $_POST['input_number'] > 8)
            $this->showError($this->getInputNumberTableIsInv());  
        else if(ModelJson::getFileName() === 'HomeCreatePost')
            for ($i=0; $i < $_POST['input_number']; $i++)
                $this->keysInput[$i] = ModelJson::getRandomKey();
    }
    function getNameTableIsReq(){
        return $this->getModelPage()['NameTableIsReq'];
    }
    function getNameTableIsInv(){
        return $this->getModelPage()['NameTableIsInv'];
    }
    function getInputNumberTableIsReq(){
        return $this->getModelPage()['InputNumberTableIsReq'];
    }
    function getInputNumberTableIsInv(){
        return $this->getModelPage()['InputNumberTableIsInv'];
    }
    //ErrorSystemlang
    function getTextRequired(){
        return $this->getModelPage()['TextRequired'];
    }
    function getTextLenght(){
        return $this->getModelPage()['TextLenght'];
    }
    //InfoBranch
    function getbranchInputOutput(){
        return $this->getModelPage()['SelectBranchBox'];
    }
    function getLabelBranchRaysName(){
        return $this->getModelPage()['LabelBranchRaysName'];
    }
    function getLabelBranchRaysPhone(){
        return $this->getModelPage()['LabelBranchRaysPhone'];
    }
    function getLabelBranchRaysCountry(){
        return $this->getModelPage()['LabelBranchRaysCountry'];
    }
    function getLabelBranchRaysGovernments(){
        return $this->getModelPage()['LabelBranchRaysGovernments'];
    }
    function getLabelBranchRaysCity(){
        return $this->getModelPage()['LabelBranchRaysCity'];
    }
    function getLabelBranchRaysStreet(){
        return $this->getModelPage()['LabelBranchRaysStreet'];
    }
    function getLabelBranchRaysBuilding(){
        return $this->getModelPage()['LabelBranchRaysBuilding'];
    }
    function getLabelBranchRaysAddress(){
        return $this->getModelPage()['LabelBranchRaysAddress'];
    }
    function getLabelWithRaysOut(){
        return $this->getModelPage()['LabelWithRaysOut'];
    }
    function getBranchRaysName(){
        return $this->getModelPage()['BranchRaysName'];
    }
    function getBranchRaysPhone(){
        return $this->getModelPage()['BranchRaysPhone'];
    }
    function getBranchRaysCountry(){
        return $this->getModelPage()['BranchRaysCountry'];
    }
    function getBranchRaysGovernments(){
        return $this->getModelPage()['BranchRaysGovernments'];
    }
    function getBranchRaysCity(){
        return $this->getModelPage()['BranchRaysCity'];
    }
    function getBranchRaysStreet(){
        return $this->getModelPage()['BranchRaysStreet'];
    }
    function getBranchRaysBuilding(){
        return $this->getModelPage()['BranchRaysBuilding'];
    }
    function getBranchRaysAddress(){
        return $this->getModelPage()['BranchRaysAddress'];
    }
    function getselectBox1(){
        return $this->getModelPage()['WithRaysOut'];
    }
    //InfoChangeLangStyle use ErrorChangelanguage, ChangeStyleLangBranch;
    function getHintNewLangName(){
        return $this->getModelPage()['HintNewLangName'];
    }
    function getLabelNameLanguage(){
        return $this->getModelPage()['LabelCreateLanguage'];
    }
    //EmailPassword use ErrorsEmailPassword
    function getCheckbooksState(){
        return $this->getModelPage()['CheckbooksState'];
    }
    function getLabelKeyPassword(){
        return $this->getModelPage()['LabelKeyPassword'];
    }
    function getHintKeyPassword(){
        return $this->getModelPage()['HintKeyPassword'];
    }
    function getLabelEmail(){
        return $this->getModelPage()['LabelEmail'];
    }
    function getHintEmail(){
        return $this->getModelPage()['HintEmail'];
    }
    function getLabelPassword(){
        return $this->getModelPage()['NewPassword'];
    }
    function getHintPassword(){
        return $this->getModelPage()['NewHintPassword'];
    }
    function makeCreateModalForgetPass($title, $button, $idModel, $index, $myObject, $action){
        include('all_modal/modal_setting_users_table.php');
    }
}
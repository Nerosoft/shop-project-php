<?php
require 'interface/DeleteInfoName.php';

class ModelJson{
    private $File;
    private $IdPage;
    private $Language;
    private $StyleFile;
    function __construct(){
        $this->File = json_decode(file_get_contents('data.json'), true);
        if(
            //page dont work if user SESSION (only logout) redirect to home
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'Login' || 
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'Register'||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost'||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginPost'||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'RegisterPost'||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginForgetPasswordPost'||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject'||
            //-----------------------------
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables' && !isset($_GET['id'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables' && !isset($this->getFile()[$_SESSION['userId']][$this->getFile()[$_SESSION['userId']]['Setting']['AllNamesLanguage']]['MyFlexTables'][$_GET['id']]) ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'FlexTablesCreatePost' && !preg_match('/MyFlexTables/', $this->getBackPage()) ||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost' && $this->getBackPage() !== 'Users' && $this->getBackPage() !== 'Product' && !preg_match('/MyFlexTables/', $this->getBackPage())||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchChangePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeDeletePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ProductCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersCreatePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLangEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost' && $this->getBackPage() !== 'ChangeLanguage' && $this->getBackPage() !== 'MyStyle'||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && !isset($_POST['state'])||
            isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'AllNamesLanguage'
            ){
            header("Location:index");
            exit;
        }else if(
            //page dont work if user not SESSION (firist login) redirect to login
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'Branches'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguage'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'Home'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyStyle'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'Product'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLang'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'Users'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'MyFlexTables'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'FlexTablesCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersDeletePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchChangePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchDeletePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'BranchEditPost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageDeletePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeDeletePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'HomeEditPost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ProductCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SettingUsersCreatePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SystemLangEditPost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguagePost'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLanguageEditPost'||
            //------------------------------------------------
            !isset($_SESSION['userId']) && isset($_GET['id']) && !isset($this->getFile()[$_GET['id']]) ||
            !isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['superId']) ||
            !isset($_SESSION['userId']) && $_SERVER["REQUEST_METHOD"] === "POST" && !isset($this->getFile()[$_POST['superId']])||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'RegisterPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'LoginForgetPasswordPost' && $_SERVER["REQUEST_METHOD"] !== "POST"||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && !isset($_POST['state'])||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && $_POST['state'] !== 'AllNamesLanguage' && $_POST['state'] !== 'Style' && $_POST['state'] !== 'branch' && $_POST['state'] !== 'branch2'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && $this->getBackPage() !== 'Login' && $this->getBackPage() !== 'Register' && $this->getBackPage() !== 'Site'||
            !isset($_SESSION['userId']) && ModelJson::getFileName() === 'SetupProject' && $this->getBackPage() !== 'Login' && $this->getBackPage() !== 'Register'){
            header("Location:Login");
            exit;
        }else if(
            ModelJson::getFileName() === 'Branches'||
            ModelJson::getFileName() === 'ChangeLanguage'||
            ModelJson::getFileName() === 'Home'||
            ModelJson::getFileName() === 'Login'||
            ModelJson::getFileName() === 'MyStyle'||
            ModelJson::getFileName() === 'Product'||
            ModelJson::getFileName() === 'Register'||
            ModelJson::getFileName() === 'Site'||
            ModelJson::getFileName() === 'SystemLang'||
            ModelJson::getFileName() === 'Users'
            )
            $this->IdPage = ModelJson::getFileName();
        else if(ModelJson::getFileName() === 'MyFlexTables')
            $this->IdPage = $_GET['id'];
        else if(ModelJson::getFileName() === 'SystemLangEditPost' || ModelJson::getFileName() === 'BranchChangePost' || ModelJson::getFileName() === 'ChangeLanguagePost' || ModelJson::getFileName() === 'SettingUsersDeletePost' || ModelJson::getFileName() === 'FlexTablesCreatePost')
            $this->IdPage = preg_match('/SystemLang/', $this->getBackPage())?'SystemLang':(preg_match('/MyFlexTables/', $this->getBackPage())?explode('=', $this->getBackPage())[1]:$this->getBackPage());
        else
            $this->IdPage = $this->getBackPage();
        // echo !isset($_SESSION['userId']) && ModelJson::getFileName() === 'ChangeLangPost' && $_SERVER["REQUEST_METHOD"] !== "POST"?'yes':'no';
        // exit;
        $this->Language = isset($_COOKIE[$this->getId().'AllNamesLanguage']) && isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']]) && !isset($_SESSION['userId'])?$_COOKIE[$this->getId().'AllNamesLanguage']:$this->getObj()['Setting']['AllNamesLanguage'];
        $this->StyleFile = isset($_COOKIE[$this->getId().'Style']) && isset($this->getModel2()['Style'][$_COOKIE[$this->getId().'Style']]) && !isset($_SESSION['userId'])?$_COOKIE[$this->getId().'Style']:$this->getObj()['Setting']['Style'];
    }
    function loginAdmin($message = 'LoginMessage'){
        $message = $this->getModelPage()[$message];
        $_SESSION['userId'] = $_POST['superId'];
        if(isset($this->getFile()[$_POST['superId']]['Branches']))
            $_SESSION['staticId'] = $_POST['superId'];
        else
            foreach ($this->getFile() as $key => $obj)
                if(isset($obj['Branches']) && in_array($_POST['superId'], array_keys($obj['Branches']))){
                    $_SESSION['staticId'] = $key;
                    break;
                }

        $this->showMessageHome($message);
    }
    function getRandomId(){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2) . substr(uniqid(), -6);
    }
    function getStyleFile(){
        return $this->StyleFile;
    }
    function getModel2(){
        return $this->getObj()[$this->getLanguage()];
    }
    function getModelPage(){
        return $this->getObj()[$this->getLanguage()][$this->getUrlName2()];
    }
    function setLanguage($lang){
        $this->Language = $lang;
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
        return isset($_SESSION['userId']) && isset($_SERVER['HTTP_REFERER']) && 
        preg_match('/SystemLang/', ucfirst(pathinfo($_SERVER['HTTP_REFERER'])['filename'])) ||
        isset($_SESSION['userId']) && isset($_SERVER['HTTP_REFERER']) && 
        preg_match('/MyFlexTables/', ucfirst(pathinfo($_SERVER['HTTP_REFERER'])['filename'])) &&
        isset($this->getFile()[$_SESSION['userId']][$this->getFile()[$_SESSION['userId']]['Setting']['AllNamesLanguage']]['MyFlexTables'][explode('=', pathinfo($_SERVER['HTTP_REFERER'])['filename'])[1]??''])
        || isset($_SERVER['HTTP_REFERER']) && isset($this->getFile()[isset($_SESSION['userId'])?$_SESSION['userId']:$_POST['superId']][$this->getFile()[isset($_SESSION['userId'])?$_SESSION['userId']:$_POST['superId']]['Setting']['AllNamesLanguage']]['Menu'][ucfirst(pathinfo($_SERVER['HTTP_REFERER'])['filename'])])?ucfirst(pathinfo($_SERVER['HTTP_REFERER'])['filename']):(isset($_SESSION['userId'])?'Home':'Login');
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
                if(isset($obj['Branches']) && in_array(isset($_GET['id'])?$_GET['id']:$this->getId(), array_keys($obj['Branches'])))
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
        return (isset($_SESSION['userId'])?$_SESSION['userId']:($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['superId'])?$_POST['superId']:(isset($_GET['id'])?$_GET['id']:(isset($_COOKIE['branchId']) && isset($this->getFile()[$_COOKIE['branchId']])?$_COOKIE['branchId']:'admin'))));
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
}
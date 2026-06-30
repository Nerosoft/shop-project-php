<?php
require 'interface/DeleteInfoName.php';
class ModelJson{
    private $File;
    private $IdPage;
    private $Language;
    private $StyleFile;
    function __construct($IdPage){
        $this->IdPage = $IdPage;
        $this->File = json_decode(file_get_contents('data.json'), true);
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
    //create and edit
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
        return pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'];
    }
    static function getBackPage(){
        return isset($_SESSION['userId']) && isset($_SERVER['HTTP_REFERER']) && 
        preg_match('/MyFlexTables/', ucfirst(pathinfo($_SERVER['HTTP_REFERER'])['filename'])) &&
        isset(json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']][json_decode(file_get_contents('data.json'), true)[$_SESSION['userId']]['Setting']['AllNamesLanguage']]['MyFlexTables'][explode('=', pathinfo($_SERVER['HTTP_REFERER'])['filename'])[1]])
        || isset($_SERVER['HTTP_REFERER']) && isset(json_decode(file_get_contents('data.json'), true)[isset($_SESSION['userId'])?$_SESSION['userId']:$_POST['superId']][json_decode(file_get_contents('data.json'), true)[isset($_SESSION['userId'])?$_SESSION['userId']:$_POST['superId']]['Setting']['AllNamesLanguage']]['Menu'][ucfirst(pathinfo($_SERVER['HTTP_REFERER'])['filename'])])?ucfirst(pathinfo($_SERVER['HTTP_REFERER'])['filename']):(isset($_SESSION['userId'])?'Home':'Login');
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
        return isset($_SESSION['userId'])?$this->File[$this->getFixedId()]['Branches']:$this->getBranch3();
    }
    function getBranch3(){
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
    function getMyModal(){
        return $this;
    }
    function showError($error){
        $_SESSION['error'] = $error;
        header('Location:'.ModelJson::getBackPage());
        exit;
    }
    function showMessage($message){
        $_SESSION['message'] = $message;
        header('Location:'.ModelJson::getBackPage());
        exit;
    }
    function showMessageHome($message){
        $_SESSION['message'] = $message;
        header('Location:index');
        exit;
    }
}
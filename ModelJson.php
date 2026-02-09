<?php
class ModelJson{
    private $File;
    private $id;
    private $FixedId;
    private $IdPage;
    private $Language;
    private $StyleFile;
    function __construct($IdPage){
        $this->IdPage = $IdPage;
        $this->File = json_decode(file_get_contents('data.json'), true);
        if(isset($_SESSION['userId'])){
            $this->id = $_SESSION['userId'];
            $this->FixedId = $_SESSION['staticId'];
        }else if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['superId']) && isset($this->File[$_POST['superId']]))
            $this->id = $_POST['superId'];
        else if($_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['superId']) || $_SERVER["REQUEST_METHOD"] === "POST" && !isset($this->File[$_POST['superId']]))
            header("Location:login");
        else if(isset($_GET['id']) && isset($this->File[$_GET['id']]))
            $this->id = $_GET['id'];
        else
            $this->id = 'admin';
        $this->Language = isset($_COOKIE[$this->getId().'lang']) && isset($this->getObj()[$_COOKIE[$this->getId().'lang']]) && !isset($_SESSION['staticId'])?$_COOKIE[$this->getId().'lang']:$this->getObj()['Setting']['Language'];
        $this->StyleFile = isset($_COOKIE[$this->getId().'style']) && isset($this->getObj()[$this->Language]['Style'][$_COOKIE[$this->getId().'style']]) && !isset($_SESSION['staticId'])?$_COOKIE[$this->getId().'style']:$this->getObj()['Setting']['Style'];
    }
    function getRandomId(){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2) . substr(uniqid(), -6);
    }
    function initViewPost($message){
        switch ($this->getUrlName2()) {
            case 'Product':
                Product::initProduct($message, 'danger');
            case 'Home':
                MyHome::initHome($message, 'danger');
            case 'Branches':
                MyBranch::initBranch($message, 'danger');
            case 'ChangeLanguage':
                MyChangeLanguage::initMyChangeLanguage($message, 'danger');
            case 'SettingUsers':
                MySettingUsers::initMySettingUsers($message, 'danger');
            case 'MyStyle':
                MyStyleClass::initMyStyleClass($message, 'danger');
            case 'Login':
                MyLogin::initMyLogin($message, 'danger');
            case 'Register':
                MyRegister::initMyRegister($message, 'danger');
            default:
                MyFlexTablesView::initMyFlexTablesView($message, 'danger');
        }
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
    function getSCRIPTFILENAME(){
        return pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'];
    }
    function showCustomeMessage($callback, $top){
        echo'<div style="position: fixed; top: '.$top.'; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">';
        $callback();
        echo'</div>';
    }
    function getFile(){
        return $this->File;
    }
    function saveFile($file){
        $this->File = $file;
        file_put_contents("data.json", json_encode($file, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
    function getObj(){
        return $this->File[$this->id];
    }
    function getBranch(){
        return $this->File[$this->FixedId]['Branches']??null;
    }
    function getFileByFixedId(){
        return $this->File[$this->FixedId];
    }
    function saveModel($data){
        $this->File[$this->id] = $data;
        file_put_contents("data.json", json_encode($this->File, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
    function getFixedId(){
        return $this->FixedId;
    }
    function getId(){
        return $this->id;
    }
    function resetId(){
        $_SESSION['userId'] = $_POST['id'];
        $this->id = $_POST['id'];
    }
    function showToast($toast, $type, $key = 'toastId', $top = 0){
        $this->showCustomeMessage(function()use($toast, $type, $key){
            include 'toast_message.php';
        }, $top);
    }
    function getMyModal(){
        return $this;
    }
}
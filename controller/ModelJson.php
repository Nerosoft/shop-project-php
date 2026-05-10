<?php
require 'interface/DeleteInfoName.php';
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
            $this->Language = $this->getObj()['Setting']['Language'];
            $this->StyleFile = $this->getObj()['Setting']['Style'];
        }else if(isset($_GET['id']) && !isset($this->File[$_GET['id']]) || $_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['superId']) || $_SERVER["REQUEST_METHOD"] === "POST" && !isset($this->File[$_POST['superId']]))
            header("Location:".$this->getUrlName2());
        else if($_SERVER["REQUEST_METHOD"] === "POST"){
            $this->id = $_POST['superId'];
            $this->Language = isset($_COOKIE[$this->getId().'AllNamesLanguage']) && isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']])?$_COOKIE[$this->getId().'AllNamesLanguage']:$this->getObj()['Setting']['Language'];
            $this->StyleFile = isset($_COOKIE[$this->getId().'Style']) && isset($this->getModel2()['Style'][$_COOKIE[$this->getId().'Style']])?$_COOKIE[$this->getId().'Style']:$this->getObj()['Setting']['Style'];
        }
        else if(isset($_GET['id'])){
            $this->id = $_GET['id'];
            $this->Language = isset($_COOKIE[$this->getId().'AllNamesLanguage']) && isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']])?$_COOKIE[$this->getId().'AllNamesLanguage']:$this->getObj()['Setting']['Language'];
            $this->StyleFile = isset($_COOKIE[$this->getId().'Style']) && isset($this->getModel2()['Style'][$_COOKIE[$this->getId().'Style']])?$_COOKIE[$this->getId().'Style']:$this->getObj()['Setting']['Style'];
        }
        else{
            $this->id = 'admin';
            $this->Language = isset($_COOKIE[$this->getId().'AllNamesLanguage']) && isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']])?$_COOKIE[$this->getId().'AllNamesLanguage']:$this->getObj()['Setting']['Language'];
            $this->StyleFile = isset($_COOKIE[$this->getId().'Style']) && isset($this->getModel2()['Style'][$_COOKIE[$this->getId().'Style']])?$_COOKIE[$this->getId().'Style']:$this->getObj()['Setting']['Style'];
        }
    }
    //create and edit
    function getRandomId(){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2) . substr(uniqid(), -6);
    }
    function initViewPost($message, $type="danger"){
        ModelJson::initView($this->getUrlName2(), $message, $type);
    }
    static function initView($keyPage, $message = 'LoadMessage', $type = 'success'){
        switch ($keyPage) {
            case 'Product':
                $view = new Product($message, $type);
                include 'views/ProductView.php';
                break;
            case 'Home':
                $view = new MyHome($message, $type);
                include 'views/home_view.php';
                break;
            case 'Branches':
                $view = new MyBranch($message, $type);
                include 'views/Branch_view.php';
                break;
            case 'Users':
                $view = new MySettingUsers($message, $type);
                include 'views/SettingUsers_view.php';
                break;
            case 'MyStyle':
                $view = new MyStyleClass($message, $type);
                include 'views/ChangeLanguage_view.php';
                break;
            case 'ChangeLanguage':
                $view = new MyChangeLanguage($message, $type);
                echo<<<HTML
                <button class="btn btn-primary" onClick="openForm('#createModel')">{$view->getButtonModelCreate()}</button>
                HTML;
                $title = $view->getScreenModelCreate();
                $button = $view->getButtonModelAdd();
                $action = 'ChangeLanguageCreatePost.php';
                include('all_modal/modal_change_language.php');
                include 'views/ChangeLanguage_view.php';
                break;
            case 'Site':
                $view = new Site($message, $type);
                include 'views/SiteView.php';
                exit;
            case 'SystemLang':
                $view = new MySystemlang($message, $type);
                include 'views/SystemLang_view.php';
                break;
            case 'Register':
                $view = new MyRegister($message, $type);
                include 'pis_of_page/login_form.php';
                include('all_modal/setting_users_iput.php');
                include 'pis_of_page/buttons.php';
                break;
            case 'Login':
                $view = new LoginRegister($message, $type);
                include 'pis_of_page/login_form.php';
                include 'pis_of_page/buttons.php';
                break;
            default:
                $view = new MyFlexTablesView($message, $type);
                include 'views/FlexTables_view.php';
        }
        include 'pis_of_page/end_html.php';
        exit;
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
        return $this->File[$this->id];
    }
    function getBranch(){
        return $this->File[$this->FixedId]['Branches'];
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
    function getMyModal(){
        return $this;
    }
    function getArrayKeys(){
        $myInputKey = array();
        for ($i=0; $i < $_POST['input_number']; $i++)
            array_push($myInputKey,$this->getRandomId());
        return $myInputKey;
    }
}
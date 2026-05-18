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
        $this->Language = $IdPage === 'Site' && isset($_COOKIE[$this->getId().'AllNamesLanguage']) && isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']]) || isset($_COOKIE[$this->getId().'AllNamesLanguage']) && isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']]) && !isset($_SESSION['userId'])?$_COOKIE[$this->getId().'AllNamesLanguage']:$this->getObj()['Setting']['Language'];
        $this->StyleFile = $IdPage === 'Site' && isset($_COOKIE[$this->getId().'AllNamesLanguage']) && isset($this->getObj()[$_COOKIE[$this->getId().'AllNamesLanguage']]) ||isset($_COOKIE[$this->getId().'Style']) && isset($this->getModel2()['Style'][$_COOKIE[$this->getId().'Style']]) && !isset($_SESSION['userId'])?$_COOKIE[$this->getId().'Style']:$this->getObj()['Setting']['Style'];
    }
    //create and edit
    function getRandomId(){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2) . substr(uniqid(), -6);
    }
    function initViewPost($message, $type="danger"){
        ModelJson::initView2($this->getUrlName2(), $message, $type);
    }
    static function initView($keyPage, $message = 'LoadMessage', $type = 'success', $callback = null){
        if($keyPage !== 'Login')
            require 'controller/'.$keyPage.'.php';
        if(!is_null($callback)){
            require 'ValidationId.php';
            $callback();
        }
        ModelJson::initView2($keyPage, $message, $type);
    }
    static function initView2($keyPage, $message, $type){
        switch ($keyPage) {
            case 'Product':
                include 'views/ProductView.php';
                break;
            case 'Home':                
                include 'views/home_view.php';
                break;
            case 'Branches':
                include 'views/Branch_view.php';
                break;
            case 'Users':
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
                include 'views/SiteView.php';
                exit;
            case 'SystemLang':
                include 'views/SystemLang_view.php';
                break;
            case 'Register':
                $view = new MyRegister($message, $type);
                include('all_modal/setting_users_iput.php');
                include 'pis_of_page/buttons.php';
                break;
            case 'Login':
                $view = new LoginRegister($message, $type);
                include 'pis_of_page/buttons.php';
                break;
            default:
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
        return $this->File[$this->getId()];
    }
    function getBranch(){
        return $this->File[$this->getFixedId()]['Branches'];
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
        return isset($_SESSION['userId'])?$_SESSION['userId']:($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['superId'])?$_POST['superId']:(isset($_GET['id'])?$_GET['id']:'admin'));
    }
    function resetId(){
        $_SESSION['userId'] = $_POST['id'];
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
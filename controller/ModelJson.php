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
    static function initView($keyPage, $message = 'LoadMessage', $type = 'success', $callback = null, $keyPage2 = null){
        require 'controller/'.$keyPage.'.php';
        if(!is_null($callback)){
            require 'ValidationId.php';
            ModelJson::initView2($keyPage2??$keyPage, $message, $type, $callback());
            // $callback();
        }
        ModelJson::initView2($keyPage2??$keyPage, $message, $type);
    }
    static function initView2($keyPage, $message, $type = "danger", $ModelJson = null){
        if($keyPage !== 'Login' && $keyPage !== 'Register' && $keyPage !== 'Site')
            $count = 1;
        switch ($keyPage) {
            case 'Product':
                include 'views/ProductView.php';
            break;
            case'CreateProjectMessage':
            case'RegisterMessage':
            case'ForgetMessage':
            case'LoginMessage':
                require 'controller/Home.php';
                // $ModelJson = new ModelJson('Home');
                if($keyPage === 'CreateProjectMessage' || isset($ModelJson->getFile()[$_POST['superId']]) && isset($ModelJson->getFile()[$_POST['superId']]['Branches'])){
                    $_SESSION['userId'] = $_POST['superId'];
                    $_SESSION['staticId'] = $_POST['superId'];
                }
                else
                    foreach ($ModelJson->getFile() as $key => $obj)
                        if(isset($obj['Branches']) && in_array($_POST['superId'], array_keys($obj['Branches']))){
                            $_SESSION['userId'] = $_POST['superId'];
                            $_SESSION['staticId'] = $key;
                            break;
                        }   
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
                echo<<<HTML
                    <div class="form-group">
                        <i class="fa fa-lock fa-2x"></i>
                        <label for="password_confirmation">{$view->getLabelConfirmPassword()}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="{$view->getHintConfirmPassword()}"
                        title="{$view->getHintConfirmPassword()}"
                        oninput="handleInputPassConfirmPass(this, '{$view->getRequiredConfirmPassword()}', '{$view->getInvalidConfirmPassword()}', 'password')"
                        oninvalid="handleInputPassConfirmPass(this, '{$view->getRequiredConfirmPassword()}', '{$view->getInvalidConfirmPassword()}', 'password')"
                        minlength="8" 
                        required>
                    </div>
                    <script>
                        function handleInputPassConfirmPass(event, req, inv, id){
                            if (event.validity.valueMissing)
                                event.setCustomValidity(req);
                            else if (event.validity.tooShort)
                                event.setCustomValidity(inv);
                            else if(event.value === $('#'+id).val()){
                                event.setCustomValidity('');
                                $('#'+id)[0].setCustomValidity('');
                            }
                            else if($(event).attr('id') === 'password' && event.value !== $('#'+id).val() && $('#'+id).val().length >=8){
                                event.setCustomValidity('');
                                $('#'+id)[0].setCustomValidity('{$view->getPasswordDosNotMatch()}');
                            }
                            else if(event.value !== $('#'+id).val() && $('#'+id).val().length >=8)
                                event.setCustomValidity('{$view->getPasswordDosNotMatch()}');
                            else if($(event).attr('id') === 'password')
                                event.setCustomValidity('');
                        }
                    </script>
                HTML;
                include('all_modal/setting_users_iput.php');
                include 'pis_of_page/buttons.php';
                break;
            case 'Login':
                $view = new Login($message, $type);
                include 'pis_of_page/buttons.php';
                echo <<<HTML
                <button onclick="openForm('#forgetpasswordmodal')" type="button" class="btn btn-success" >{$view->getButtonForgetPassword()}</button>
                HTML;
                $view->makeCreateModal($view, $view->getModalForgetPasswordTitle(), $view->getModalForgetPasswordButton(), "forgetpasswordmodal", null, null, 'LoginForgetPasswordPost.php');
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
    function getMyModal(){
        return $this;
    }
}
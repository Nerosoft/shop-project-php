<?php
class MyRegister extends ModelJson{    
    function __construct(){
        parent::__construct('Register', 'RegisterPost');
        $this->loginRegister();
    }
    function getLabelConfirmPassword(){
        return $this->getModelPage()['LabelConfirmPassword'];
    }
    function getHintConfirmPassword(){
        return $this->getModelPage()['HintConfirmPassword'];
    }
    function getView(){
        include 'view/register_view.php';
        echo <<<HTML
        <button onclick="showMessageProg()" type="button" class="btn btn-success btinfo">{$this->getButtonForgetPassword2()}</button>
        HTML;
        include 'pis_of_page/buttons.php';    
    }
    function getButtonForgetPassword2(){
        return $this->getModelPage()['ButtonForgetPassword'];
    }
}
$view = new MyRegister();
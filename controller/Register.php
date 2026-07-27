<?php
class MyRegister extends ModelJson{    
    function __construct(){
        parent::__construct('Register', 'RegisterPost');
    }
    function getView(){
        echo <<<HTML
        <button onclick="showMessageProg()" type="button" class="btn btn-success btinfo">{$this->getButtonForgetPassword()}</button>
        HTML;
    }
    function getLabelConfirmPassword(){
        return $this->getModelPage()['LabelConfirmPassword'];
    }
    function getHintConfirmPassword(){
        return $this->getModelPage()['HintConfirmPassword'];
    }
}
new MyRegister();
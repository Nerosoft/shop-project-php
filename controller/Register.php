<?php
class MyRegister extends ModelJson{    
    function __construct(){
        parent::__construct('Register', 'RegisterPost');
    }
    function getLabelConfirmPassword(){
        return $this->getModelPage()['LabelConfirmPassword'];
    }
    function getHintConfirmPassword(){
        return $this->getModelPage()['HintConfirmPassword'];
    }
}
new MyRegister();
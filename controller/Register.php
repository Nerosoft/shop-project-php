<?php
require 'all_trait/ErrorRegister.php';
class MyRegister extends LoginRegister{    
    use ErrorRegister;
    private $LabelConfirmPassword;
    private $HintConfirmPassword;
    function __construct($message, $type){
        parent::__construct($message, $type, 'Register', 'RegisterPost.php');
        $this->initErrorsRegister($this->getModelPage());
        $this->LabelConfirmPassword = $this->getModelPage()['LabelConfirmPassword'];
        $this->HintConfirmPassword = $this->getModelPage()['HintConfirmPassword'];
    }
    function getLabelConfirmPassword(){
        return $this->LabelConfirmPassword;
    }
    function getHintConfirmPassword(){
        return $this->HintConfirmPassword;
    }
}
<?php
require 'LoginRegister.php';
require 'all_trait/ErrorRegister.php';
class MyRegister extends LoginRegister{    
    use ErrorRegister;
    private $LabelConfirmPassword;
    private $HintConfirmPassword;
    function __construct($message, $type){
        parent::__construct('Register', $message, $type);
        $this->initErrorsRegister($this->getModelPage());
        $this->LabelConfirmPassword = $this->getModelPage()['LabelConfirmPassword'];
        $this->HintConfirmPassword = $this->getModelPage()['HintConfirmPassword'];
    }
    static function initMyRegister($message = 'LoadMessage', $type = 'success'){
        $view = new MyRegister($message, $type);
        include 'views/register_view.php';
        exit;
    }
    function getLabelConfirmPassword(){
        return $this->LabelConfirmPassword;
    }
    function getHintConfirmPassword(){
        return $this->HintConfirmPassword;
    }
}
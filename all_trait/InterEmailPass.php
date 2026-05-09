<?php
require 'ErrorsEmailPassword.php';
trait EmailPassword{
    use ErrorsEmailPassword;
    private $LabelEmail;
    private $HintEmail;
    private $LabelPassword;
    private $HintPassword;
    private $LabelPassword2;
    private $HintPassword2;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    private $CheckbooksState;
    function getCheckbooksState(){
        return $this->CheckbooksState;
    }
    function initEmailPassword($info, $keypass = 'NewPassword', $keyHintpass = 'NewHintPassword'){
        $this->initErrorsEmailPassword($info);
        $this->LabelEmail = $info['LabelEmail'];
        $this->HintEmail = $info['HintEmail'];
        $this->LabelKeyPassword = $info['LabelKeyPassword'];
        $this->LabelPassword = $info['NewPassword'];
        $this->HintPassword = $info['NewHintPassword'];
        $this->HintKeyPassword = $info['HintKeyPassword'];
        $this->CheckbooksState = $info['CheckbooksState'];
        if($this->getUrlName2() !== 'Users'){
            $this->LabelPassword2 = $info['LabelPassword'];
            $this->HintPassword2 = $info['LabelPassword'];
        }
    }
    function getLabelKeyPassword(){
        return $this->LabelKeyPassword;
    }
    function getHintKeyPassword(){
        return $this->HintKeyPassword;
    }
    function getLabelEmail(){
        return $this->LabelEmail;
    }
    function getHintEmail(){
        return $this->HintEmail;
    }
    function getLabelPassword(){
        return $this->LabelPassword;
    }
    function getHintPassword(){
        return $this->HintPassword;
    }
    function getLabelPassword2(){
        return $this->LabelPassword2;
    }
    function getHintPassword2(){
        return $this->HintPassword2;
    }
}
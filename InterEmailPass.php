<?php
trait EmailPassword{
    private $LabelEmail;
    private $HintEmail;
    private $LabelPassword;
    private $HintPassword;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    function initEmailPassword($info){
        $this->LabelEmail = $info['LabelEmail'];
        $this->HintEmail = $info['HintEmail'];
        $this->LabelPassword = $info['LabelPassword'];
        $this->HintPassword = $info['HintPassword'];
        $this->LabelKeyPassword = $info['LabelKeyPassword'];
        $this->HintKeyPassword = $info['HintKeyPassword'];
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
}
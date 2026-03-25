<?php
trait ErrorsHome{
    private $NameTableIsReq;
    private $NameTableIsInv;
    private $InputNumberTableIsReq;
    private $InputNumberTableIsInv;
    function initErrorsHome($error){
        $this->NameTableIsReq = $error['NameTableIsReq'];
        $this->NameTableIsInv = $error['NameTableIsInv'];
        $this->InputNumberTableIsReq = $error['InputNumberTableIsReq'];
        $this->InputNumberTableIsInv = $error['InputNumberTableIsInv']; 
    }
    function initErrorsHome2($modal){
        $this->initErrorsHome($modal->getModelPage());
        if(!isset($_POST['name']) || $_POST['name'] === '')
            MyHome::initHome($this->getNameTableIsReq(), 'danger');
        else if(strlen($_POST['name']) < 3)
            MyHome::initHome($this->getNameTableIsInv(), 'danger');
    }
    function getNameTableIsReq(){
        return $this->NameTableIsReq;
    }
    function getNameTableIsInv(){
        return $this->NameTableIsInv;
    }
    function getInputNumberTableIsReq(){
        return $this->InputNumberTableIsReq;
    }
    function getInputNumberTableIsInv(){
        return $this->InputNumberTableIsInv;
    }
}
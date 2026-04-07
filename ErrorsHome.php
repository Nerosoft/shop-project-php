<?php
trait ErrorsHome{
    private $NameTableIsReq;
    private $NameTableIsInv;
    private $InputNumberTableIsReq;
    private $InputNumberTableIsInv;
    function initErrorsHome($error){
        $this->initErrorsHome3($error); 
        $this->InputNumberTableIsReq = $error['InputNumberTableIsReq'];
        $this->InputNumberTableIsInv = $error['InputNumberTableIsInv'];
    }
    function initErrorsHome3($error){
        $this->NameTableIsReq = $error['NameTableIsReq'];
        $this->NameTableIsInv = $error['NameTableIsInv'];
    }
    function initErrorsHome2($modal){
        $this->initErrorsHome($modal->getModelPage());
        $this->validName($modal->getSCRIPTFILENAME());
    }
    function validName($nameScript = ''){
        if(!isset($_POST['name']) || $_POST['name'] === '')
            MyHome::initHome($this->getNameTableIsReq(), 'danger');
        else if(strlen($_POST['name']) < 3)
            MyHome::initHome($this->getNameTableIsInv(), 'danger');
        else if($nameScript === 'HomeCreatePost' && !isset($_POST['input_number']) || $nameScript === 'HomeCreatePost' && $_POST['input_number'] === '')
            MyHome::initHome($this->getInputNumberTableIsReq(), 'danger');
        else if($nameScript === 'HomeCreatePost' && !is_numeric($_POST['input_number']) || $nameScript === 'HomeCreatePost' && $_POST['input_number'] > 8)
            MyHome::initHome($this->getInputNumberTableIsInv(), 'danger');    
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
<?php
trait ErrorsHome{
    private $NameTableIsReq;
    private $NameTableIsInv;
    private $InputNumberTableIsReq;
    private $InputNumberTableIsInv;
    function initErrorsHome($error){
        $this->NameTableIsReq = $error['NameTableIsReq'];
        $this->NameTableIsInv = $error['NameTableIsInv'];
        if($this->getSCRIPTFILENAME() !== 'HomeEditPost'){
            $this->InputNumberTableIsReq = $error['InputNumberTableIsReq'];
            $this->InputNumberTableIsInv = $error['InputNumberTableIsInv'];
        }
    }
    function validName(){
        $this->initErrorsHome($this->getModelPage());
        if(!isset($_POST['name']) || $_POST['name'] === '')
            $this->initViewPost($this->getNameTableIsReq());
        else if(strlen($_POST['name']) < 3)
            $this->initViewPost($this->getNameTableIsInv());
        else if($this->getSCRIPTFILENAME() === 'HomeCreatePost' && !isset($_POST['input_number']) || $this->getSCRIPTFILENAME() === 'HomeCreatePost' && $_POST['input_number'] === '')
            $this->initViewPost($this->getInputNumberTableIsReq());
        else if($this->getSCRIPTFILENAME() === 'HomeCreatePost' && !is_numeric($_POST['input_number']) || $this->getSCRIPTFILENAME() === 'HomeCreatePost' && $_POST['input_number'] > 8)
            $this->initViewPost($this->getInputNumberTableIsInv());    
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
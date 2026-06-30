<?php
trait ErrorsHome{
    private $NameTableIsReq;
    private $NameTableIsInv;
    private $InputNumberTableIsReq;
    private $InputNumberTableIsInv;
    function initErrorsHome(){
        $this->NameTableIsReq = $this->getModelPage()['NameTableIsReq'];
        $this->NameTableIsInv = $this->getModelPage()['NameTableIsInv'];
        if(ModelJson::getFileName() !== 'HomeEditPost'){
            $this->InputNumberTableIsReq = $this->getModelPage()['InputNumberTableIsReq'];
            $this->InputNumberTableIsInv = $this->getModelPage()['InputNumberTableIsInv'];
        }
    }
    function validName(){
        $this->initErrorsHome();
        if(!isset($_POST['name']) || $_POST['name'] === '')
            $this->showError($this->getNameTableIsReq());
        else if(strlen($_POST['name']) < 3)
            $this->showError($this->getNameTableIsInv());
        else if(ModelJson::getFileName() === 'HomeCreatePost' && !isset($_POST['input_number']) || ModelJson::getFileName() === 'HomeCreatePost' && $_POST['input_number'] === '')
            $this->showError($this->getInputNumberTableIsReq());
        else if(ModelJson::getFileName() === 'HomeCreatePost' && !is_numeric($_POST['input_number']) || ModelJson::getFileName() === 'HomeCreatePost' && $_POST['input_number'] > 8)
            $this->showError($this->getInputNumberTableIsInv());  
        else if(ModelJson::getFileName() === 'HomeCreatePost')
            for ($i=0; $i < $_POST['input_number']; $i++)
                array_push($this->keysInput, $this->getRandomId());  
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
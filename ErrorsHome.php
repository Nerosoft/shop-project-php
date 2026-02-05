<?php
require 'ErrorsHomeName.php';
trait ErrorsHome{
    use ErrorsHomeName;
    private $InputNumberTableIsReq;
    private $InputNumberTableIsInv;
    function initErrorsHome($error){
        $this->initErrorsHomeName($error);
        $this->InputNumberTableIsReq = $error['InputNumberTableIsReq'];
        $this->InputNumberTableIsInv = $error['InputNumberTableIsInv']; 
    }
    function initErrorsHome2($modal){
        $this->initErrorsHome($modal->getModelPage());
        $this->validName($modal);
    }
    function getInputNumberTableIsReq(){
        return $this->InputNumberTableIsReq;
    }
    function getInputNumberTableIsInv(){
        return $this->InputNumberTableIsInv;
    }
}
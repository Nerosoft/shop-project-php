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
    function getInputNumberTableIsReq(){
        return $this->InputNumberTableIsReq;
    }
    function getInputNumberTableIsInv(){
        return $this->InputNumberTableIsInv;
    }
}
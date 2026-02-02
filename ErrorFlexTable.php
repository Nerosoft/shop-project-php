<?php
trait ErrorFlexTable{
    private $ErrorsMessageReq;
    private $ErrorsMessageInv;
    function initErrorFlexTable($error){
        $this->ErrorsMessageReq = $error['ErrorsMessageReq'];
        $this->ErrorsMessageInv = $error['ErrorsMessageInv'];
    }
    function getErrorsMessageReq(){
        return $this->ErrorsMessageReq;
    }
    function getErrorsMessageInv(){
        return $this->ErrorsMessageInv;
    }
}
<?php
trait ErrorFlexTable{
    private $ErrorsMessageReq;
    private $ErrorsMessageInv;
    function initErrorFlexTable($error){
        $this->ErrorsMessageReq = $error['ErrorsMessageReq'];
        $this->ErrorsMessageInv = $error['ErrorsMessageInv'];
    }
    function initErrorFlexTable2($modal){
        $this->initErrorFlexTable($modal->getModelPage());
        foreach ($this->getErrorsMessageReq() as $key => $value)
            if(!isset($_POST[$key]) || $_POST[$key] === '')
                MyFlexTablesView::initMyFlexTablesView($this->getErrorsMessageReq()[$key], 'danger');
            else if(strlen($_POST[$key]) < 3)
                MyFlexTablesView::initMyFlexTablesView($this->getErrorsMessageInv()[$key], 'danger');
    }
    function getErrorsMessageReq(){
        return $this->ErrorsMessageReq;
    }
    function getErrorsMessageInv(){
        return $this->ErrorsMessageInv;
    }
}
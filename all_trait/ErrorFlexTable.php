<?php
require 'TableProductImage.php';
trait ErrorFlexTable{
    use TableProductImage;
    private $ErrorsMessageReq;
    private $ErrorsMessageInv;
    function initErrorFlexTable(){
        $this->initTableProductImage();
        $this->ErrorsMessageReq = $this->getModelPage()['ErrorsMessageReq'];
        $this->ErrorsMessageInv = $this->getModelPage()['ErrorsMessageInv'];
    }
    function initErrorFlexTable2(){
        $this->validMyImage();
        $this->initErrorFlexTable();
        foreach ($this->getErrorsMessageReq() as $key => $value)
            if(!isset($_POST[$key]) || $_POST[$key] === '')
                $this->showError($this->getErrorsMessageReq()[$key]);
            else if(strlen($_POST[$key]) < 3)
                $this->showError($this->getErrorsMessageInv()[$key]);
    }
    function getErrorsMessageReq(){
        return $this->ErrorsMessageReq;
    }
    function getErrorsMessageInv(){
        return $this->ErrorsMessageInv;
    }
}
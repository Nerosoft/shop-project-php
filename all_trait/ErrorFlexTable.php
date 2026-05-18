<?php
require 'TableProductImage.php';
trait ErrorFlexTable{
    use TableProductImage;
    private $ErrorsMessageReq;
    private $ErrorsMessageInv;
    function initErrorFlexTable($error){
        $this->initTableProductImage();
        $this->ErrorsMessageReq = $error['ErrorsMessageReq'];
        $this->ErrorsMessageInv = $error['ErrorsMessageInv'];
    }
    function initErrorFlexTable2($modal){
        $this->validMyImage();
        $this->initErrorFlexTable($modal->getModelPage());
        foreach ($this->getErrorsMessageReq() as $key => $value)
            if(!isset($_POST[$key]) || $_POST[$key] === '')
                ModelJson::initView2($this->getUrlName2(), $this->getErrorsMessageReq()[$key]);
            else if(strlen($_POST[$key]) < 3)
                ModelJson::initView2($this->getUrlName2(), $this->getErrorsMessageInv()[$key]);
    }
    function getErrorsMessageReq(){
        return $this->ErrorsMessageReq;
    }
    function getErrorsMessageInv(){
        return $this->ErrorsMessageInv;
    }
}
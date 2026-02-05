<?php
trait ErrorsHomeName{
    private $NameTableIsReq;
    private $NameTableIsInv;
    function initErrorsHomeName($page){
        $this->NameTableIsReq = $page['NameTableIsReq'];
        $this->NameTableIsInv = $page['NameTableIsInv'];
    }
    function initErrorsHomeName2($modal){
       $this->initErrorsHomeName($modal->getModelPage());
       $this->validName($modal);
    }
    function validName($modal){
        if(!isset($_POST['name']) || $_POST['name'] === '')
            $modal->initViewPost($this->getNameTableIsReq());
        else if(strlen($_POST['name']) < 3)
            $modal->initViewPost($this->getNameTableIsInv());
    }
    function getNameTableIsReq(){
        return $this->NameTableIsReq;
    }
    function getNameTableIsInv(){
        return $this->NameTableIsInv;
    }
}
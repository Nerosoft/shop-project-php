<?php
trait ErrorsHomeName{
    private $NameTableIsReq;
    private $NameTableIsInv;
    function initErrorsHomeName($page){
        $this->NameTableIsReq = $page['NameTableIsReq'];
        $this->NameTableIsInv = $page['NameTableIsInv'];
    }
    function getNameTableIsReq(){
        return $this->NameTableIsReq;
    }
    function getNameTableIsInv(){
        return $this->NameTableIsInv;
    }
}
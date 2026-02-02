<?php
trait ErrorProduct{
    private $RequiredName;
    private $InvalidName;
    private $RequiredDescreption;
    private $RequiredSalary;
    private $RequiredCategory;
    private $InvalidDescreption;
    private $InvalidSalary;
    private $InvalidCategory;
    private $Reqimage;
    private $Invimage;
    private $UploadImgInv;
    function initErrorProduct($error){
        $this->RequiredName = $error['RequiredName'];
        $this->InvalidName = $error['InvalidName'];
        $this->RequiredDescreption = $error['RequiredDescreption'];
        $this->RequiredSalary = $error['RequiredSalary'];
        $this->RequiredCategory = $error['RequiredCategory'];
        $this->InvalidDescreption = $error['InvalidDescreption'];
        $this->InvalidSalary = $error['InvalidSalary'];
        $this->InvalidCategory = $error['InvalidCategory'];
        $this->Reqimage = $error['Reqimage'];
        $this->Invimage = $error['Invimage'];
        $this->UploadImgInv = $error['UploadImgInv'];
    }
    function getUploadImgInv(){
        return $this->UploadImgInv;
    }
    function getReqimage(){
        return $this->Reqimage;
    }
    function getInvimage(){
        return $this->Invimage;
    }
    function getRequiredName(){
        return $this->RequiredName;
    }
    function getRequiredDescreption(){
        return $this->RequiredDescreption;
    }
    function getRequiredSalary(){
        return $this->RequiredSalary;
    }
    function getRequiredCategory(){
        return $this->RequiredCategory;
    }
    function getInvalidName(){
        return $this->InvalidName;
    }
    function getInvalidDescreption(){
        return $this->InvalidDescreption;
    }
    function getInvalidSalary(){
        return $this->InvalidSalary;
    }
    function getInvalidCategory(){
        return $this->InvalidCategory;
    }
}
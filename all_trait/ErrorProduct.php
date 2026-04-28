<?php
require 'TableProductImage.php';
trait ErrorProduct{
    use TableProductImage;
    private $RequiredName;
    private $InvalidName;
    private $RequiredDescreption;
    private $RequiredSalary;
    private $RequiredCategory;
    private $InvalidDescreption;
    private $InvalidSalary;
    private $InvalidCategory;
    function initErrorProduct($error){
        $this->initTableProductImage();
        $this->RequiredName = $error['RequiredName'];
        $this->InvalidName = $error['InvalidName'];
        $this->RequiredDescreption = $error['RequiredDescreption'];
        $this->RequiredSalary = $error['RequiredSalary'];
        $this->RequiredCategory = $error['RequiredCategory'];
        $this->InvalidDescreption = $error['InvalidDescreption'];
        $this->InvalidSalary = $error['InvalidSalary'];
        $this->InvalidCategory = $error['InvalidCategory'];
    }
    function validProductInput($modal){
        $this->initErrorProduct($modal->getModelPage());
        $this->validMyImage();
        if(!isset($_POST['name']) || $_POST['name'] === '')
           Product::initProduct($this->getRequiredName(), 'danger');
        else if(strlen($_POST['name']) < 3)
           Product::initProduct($this->getInvalidName(), 'danger');
        else if(!isset($_POST['descreption']) || $_POST['descreption'] === '')
           Product::initProduct($this->getRequiredDescreption(), 'danger');
        else if(strlen($_POST['descreption']) < 8)
           Product::initProduct($this->getInvalidDescreption(), 'danger');
        else if(!isset($_POST['salary']) || $_POST['salary'] === '')
           Product::initProduct($this->getRequiredSalary(), 'danger');
        else if(!is_numeric($_POST['salary']) || $_POST['salary'] > 1000000)
           Product::initProduct($this->getInvalidSalary(), 'danger');
        else if(!isset($_POST['category']) || $_POST['category'] === '')
           Product::initProduct($this->getRequiredCategory(), 'danger');
        else if(strlen($_POST['category']) < 3)
           Product::initProduct($this->getInvalidCategory(), 'danger');
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
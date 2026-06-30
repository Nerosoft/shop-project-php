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
    function initErrorProduct(){
        $this->initTableProductImage();
        $this->RequiredName = $this->getModelPage()['RequiredName'];
        $this->InvalidName = $this->getModelPage()['InvalidName'];
        $this->RequiredDescreption = $this->getModelPage()['RequiredDescreption'];
        $this->RequiredSalary = $this->getModelPage()['RequiredSalary'];
        $this->RequiredCategory = $this->getModelPage()['RequiredCategory'];
        $this->InvalidDescreption = $this->getModelPage()['InvalidDescreption'];
        $this->InvalidSalary = $this->getModelPage()['InvalidSalary'];
        $this->InvalidCategory = $this->getModelPage()['InvalidCategory'];
    }
    function validProductInput(){
        $this->initErrorProduct();
        $this->validMyImage();
        if(!isset($_POST['name']) || $_POST['name'] === '')
           $this->showError($this->getRequiredName());
        else if(strlen($_POST['name']) < 3)
           $this->showError($this->getInvalidName());
        else if(!isset($_POST['descreption']) || $_POST['descreption'] === '')
           $this->showError($this->getRequiredDescreption());
        else if(strlen($_POST['descreption']) < 8)
           $this->showError($this->getInvalidDescreption());
        else if(!isset($_POST['salary']) || $_POST['salary'] === '')
           $this->showError($this->getRequiredSalary());
        else if(!is_numeric($_POST['salary']) || $_POST['salary'] > 1000000)
           $this->showError($this->getInvalidSalary());
        else if(!isset($_POST['category']) || $_POST['category'] === '')
           $this->showError($this->getRequiredCategory());
        else if(strlen($_POST['category']) < 3)
           $this->showError($this->getInvalidCategory());
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
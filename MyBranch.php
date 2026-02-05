<?php
require 'page.php';
require 'ErrorBranch.php';
class MyBranch extends Page{
    use ErrorBranch;
    private $branchInputOutput;
    private $BranchStreet;
    private $BranchName;
    private $BranchPhone;
    private $BranchGovernments;
    private $BranchCity;
    private $BranchBuilding;
    private $BranchAddress;
    private $BranchCountry;
    private $BranchFollow;
    private $BranchRaysName;
    private $BranchRaysPhone;
    private $BranchRaysCountry;
    private $BranchRaysGovernments;
    private $BranchRaysCity;
    private $BranchRaysStreet;
    private $BranchRaysBuilding;
    private $BranchRaysAddress;
    private $selectBox1;
    private $DataView;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Branches', $message, $type);
        $this->initErrorBranch($this->getModelPage());
        $this->branchInputOutput = $this->getModel2()['SelectBranchBox'];
        $this->BranchRaysName = $this->getModelPage()['BranchRaysName'];
        $this->BranchRaysPhone = $this->getModelPage()['BranchRaysPhone'];
        $this->BranchRaysCountry = $this->getModelPage()['BranchRaysCountry'];
        $this->BranchRaysGovernments = $this->getModelPage()['BranchRaysGovernments'];
        $this->BranchRaysCity = $this->getModelPage()['BranchRaysCity'];
        $this->BranchRaysStreet = $this->getModelPage()['BranchRaysStreet'];
        $this->BranchRaysBuilding = $this->getModelPage()['BranchRaysBuilding'];
        $this->BranchRaysAddress = $this->getModelPage()['BranchRaysAddress'];
        $this->selectBox1 = $this->getModelPage()['WithRaysOut'];
        $this->BranchStreet = $this->getModelPage()['BranchStreet'];
        $this->BranchName = $this->getModelPage()['BranchName'];
        $this->BranchPhone = $this->getModelPage()['BranchPhone'];
        $this->BranchGovernments = $this->getModelPage()['BranchGovernments'];
        $this->BranchCity = $this->getModelPage()['BranchCity'];
        $this->BranchBuilding = $this->getModelPage()['BranchBuilding'];
        $this->BranchAddress = $this->getModelPage()['BranchAddress'];
        $this->BranchCountry = $this->getModelPage()['BranchCountry'];
        $this->BranchFollow = $this->getModelPage()['BranchFollow'];
        //get all hint
        $this->DataView = Branch::fromArray($this->getBranch(), $this->getbranchInputOutput());
    }
    function getMyDataView(){
        return $this->DataView;
    }
    function getbranchInputOutput(){
        return $this->branchInputOutput;
    }
    function getBranchStreet(){
        return $this->BranchStreet;
    }
    function getBranchName(){
        return $this->BranchName;
    }
    function getBranchPhone(){
        return $this->BranchPhone;
    }
    function getBranchGovernments(){
        return $this->BranchGovernments;
    }
    function getBranchCity(){
        return $this->BranchCity;
    }
    function getBranchBuilding(){
        return $this->BranchBuilding;
    }
    function getBranchAddress(){
        return $this->BranchAddress;
    }
    function getBranchCountry(){
        return $this->BranchCountry;
    }
    function getBranchFollow(){
        return $this->BranchFollow;
    }
    function getBranchRaysName(){
        return $this->BranchRaysName;
    }
    function getBranchRaysPhone(){
        return $this->BranchRaysPhone;
    }
    function getBranchRaysCountry(){
        return $this->BranchRaysCountry;
    }
    function getBranchRaysGovernments(){
        return $this->BranchRaysGovernments;
    }
    function getBranchRaysCity(){
        return $this->BranchRaysCity;
    }
    function getBranchRaysStreet(){
        return $this->BranchRaysStreet;
    }
    function getBranchRaysBuilding(){
        return $this->BranchRaysBuilding;
    }
    function getBranchRaysAddress(){
        return $this->BranchRaysAddress;
    }
    function getselectBox1(){
        return $this->selectBox1;
    }
    static function initBranch($message = 'LoadMessage', $type = 'success'){
        $view = new MyBranch($message, $type);
        include 'Branch_view.php';
        exit;
    }
}
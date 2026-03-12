<?php
require 'page.php';
require 'ErrorBranch.php';
require 'ChangeStyleLangBranch.php';
include 'InfoBranch.php';
require 'InterfaceDataView.php';
class MyBranch extends Page implements InterfaceDataView{
    use ErrorBranch, ChangeStyleLangBranch, InfoBranch;
    private $BranchStreet;
    private $BranchName;
    private $BranchPhone;
    private $BranchGovernments;
    private $BranchCity;
    private $BranchBuilding;
    private $BranchAddress;
    private $BranchCountry;
    private $BranchFollow;
    private $FlexTable;
    private $SettingAccounts;
    private $Product;
    private $DataView;
    function getFlexTable(){
        return $this->FlexTable;
    }
    function getSettingAccounts(){
        return $this->SettingAccounts;
    }
    function getProduct(){
        return $this->Product;
    }
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Branches', $message, $type);
        $this->initErrorBranch($this->getModelPage());
        $this->initChangeStyleLangBranch($this->getModelPage());
        $this->initInfoBranch($this->getMyModal());
        $this->BranchStreet = $this->getModelPage()['BranchStreet'];
        $this->BranchName = $this->getModelPage()['BranchName'];
        $this->BranchPhone = $this->getModelPage()['BranchPhone'];
        $this->BranchGovernments = $this->getModelPage()['BranchGovernments'];
        $this->BranchCity = $this->getModelPage()['BranchCity'];
        $this->BranchBuilding = $this->getModelPage()['BranchBuilding'];
        $this->BranchAddress = $this->getModelPage()['BranchAddress'];
        $this->BranchCountry = $this->getModelPage()['BranchCountry'];
        $this->BranchFollow = $this->getModelPage()['BranchFollow'];
        $this->FlexTable = $this->getModelPage()['FlexTable'];
        $this->SettingAccounts = $this->getModelPage()['SettingAccounts'];
        $this->Product = $this->getModelPage()['Product'];
        //get all hint
        $this->DataView = Branch::fromArray($this->getBranch(), $this->getbranchInputOutput());
    }
    function getMyDataView(){
        return $this->DataView;
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
    
    static function initBranch($message = 'LoadMessage', $type = 'success'){
        $view = new MyBranch($message, $type);
        include 'Branch_view.php';
        exit;
    }
}
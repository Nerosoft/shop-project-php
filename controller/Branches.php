<?php
require 'page.php';
require 'all_trait/ErrorBranch.php';
require 'all_trait/ChangeStyleLangBranch.php';
include 'all_trait/InfoBranch.php';
require 'interface/InterfaceDataView.php';
require 'class_object/BranchClass.php';
class MyBranch extends Page implements InterfaceDataView{
    use ErrorBranch, ChangeStyleLangBranch, InfoBranch;
    // private $BranchStreet;
    // private $BranchName;
    // private $BranchPhone;
    // private $BranchGovernments;
    // private $BranchCity;
    // private $BranchBuilding;
    // private $BranchAddress;
    // private $BranchCountry;
    // private $BranchFollow;
    private $FlexTable;
    private $SettingAccounts;
    private $Product;
    function getFlexTable(){
        return $this->FlexTable;
    }
    function getSettingAccounts(){
        return $this->SettingAccounts;
    }
    function getProduct(){
        return $this->Product;
    }
    function __construct($message, $type){
        parent::__construct('Branches', $message, $type, function(){
            $this->initInfoBranch();
            return Branch::fromArray($this->getBranch(), $this->getbranchInputOutput());
        }, Branch::getKeysObject());
        $this->initErrorBranch();
        $this->FlexTable = $this->getModelPage()['FlexTable'];
        $this->SettingAccounts = $this->getModelPage()['SettingAccounts'];
        $this->Product = $this->getModelPage()['Product'];
    }
    function getBranchStreet(){
        return $this->getModelPage()['BranchStreet'];//$this->BranchStreet;
    }
    function getBranchName(){
        return $this->getModelPage()['BranchName'];//$this->BranchName;
    }
    function getBranchPhone(){
        return $this->getModelPage()['BranchPhone'];//$this->BranchPhone;
    }
    function getBranchGovernments(){
        return $this->getModelPage()['BranchGovernments'];//$this->BranchGovernments;
    }
    function getBranchCity(){
        return $this->getModelPage()['BranchCity'];//$this->BranchCity;
    }
    function getBranchBuilding(){
        return $this->getModelPage()['BranchBuilding'];//$this->BranchBuilding;
    }
    function getBranchAddress(){
        return $this->getModelPage()['BranchAddress'];//$this->BranchAddress;
    }
    function getBranchCountry(){
        return $this->getModelPage()['BranchCountry'];//$this->BranchCountry;
    }
    function getBranchFollow(){
        return $this->getModelPage()['BranchFollow'];//$this->BranchFollow;
    }
    function printTableNames(){
        echo <<<HTML
            <th>{$this->getBranchName()}</th>
            <th>{$this->getBranchPhone()}</th>
            <th>{$this->getBranchGovernments()}</th>
            <th>{$this->getBranchCity()}</th>
            <th>{$this->getBranchStreet()}</th>
            <th>{$this->getBranchBuilding()}</th>
            <th>{$this->getBranchAddress()}</th>
            <th>{$this->getBranchCountry()}</th>
            <th>{$this->getBranchFollow()}</th>
        HTML;
    }
    function makeCreateModal($view, $title, $button){
        $action = 'BranchCreatePost.php';
        include('all_modal/model_branch.php');
    }
}
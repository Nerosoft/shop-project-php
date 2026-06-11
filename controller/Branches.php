<?php
require 'AdminMenu.php';
require 'all_trait/ErrorBranch.php';
require 'all_trait/ChangeStyleLangBranch.php';
include 'all_trait/InfoBranch.php';
require 'interface/InterfaceDataView.php';
require 'class_object/BranchClass.php';
class MyBranch extends AdminMenu implements InterfaceDataView{
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
            $this->initErrorBranch();
            $this->FlexTable = $this->getModelPage()['FlexTable'];
            $this->SettingAccounts = $this->getModelPage()['SettingAccounts'];
            $this->Product = $this->getModelPage()['Product'];
            $this->BranchStreet = $this->getModelPage()['BranchStreet'];
            $this->BranchName = $this->getModelPage()['BranchName'];
            $this->BranchPhone = $this->getModelPage()['BranchPhone'];
            $this->BranchGovernments = $this->getModelPage()['BranchGovernments'];
            $this->BranchCity = $this->getModelPage()['BranchCity'];
            $this->BranchBuilding = $this->getModelPage()['BranchBuilding'];
            $this->BranchAddress = $this->getModelPage()['BranchAddress'];
            $this->BranchCountry = $this->getModelPage()['BranchCountry'];
            $this->BranchFollow = $this->getModelPage()['BranchFollow'];
            return Branch::fromArray($this->getBranch(), $this->getbranchInputOutput());
        }, Branch::getKeysObject(),  function ($view, $title, $button){
            $this->makeCreateModal($view, $title, $button, 'createModel', null, null, 'BranchCreatePost.php');
        });
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
    function makeCreateModal($view, $title, $button, $idModel, $index = null, $myObject = null, $action = 'BranchEditPost.php'){
        include('all_modal/model_branch.php');
    }
}
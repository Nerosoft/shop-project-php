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
    private $IdBranch;
    function getFlexTable(){
        return $this->FlexTable;
    }
    function getSettingAccounts(){
        return $this->SettingAccounts;
    }
    function getProduct(){
        return $this->Product;
    }
     function getIdBranch(){
        return $this->IdBranch;
     }
    function __construct($message, $type){
        parent::__construct('Branches', $message, $type, function(){
            $this->initInfoBranch();
            $this->initErrorBranch();
            $this->IdBranch = $this->getModelPage()['IdBranch'];
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
        }, Branch::getKeysObject());
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
    function makeCreateModal($view, $title, $button){
        $action = 'BranchCreatePost.php';
        include('all_modal/model_branch.php');

            echo<<<HTML
            <div class="form-group">
                <i class="fa fa-map fa-2x"></i>
                <label for="selectedBranch">{$view->getIdBranch()}</label>
                <select
                onchange="resetBranch(this)"
                title=""
                class="form-select" name="selectedBranch"  aria-label="Default select example">
            HTML;
                foreach($view->getBranch() as $key=>$name){
                        $select = $key === $view->getId()? 'selected' : '';
                        $arr = array();
                        if(isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['Language']]['MyFlexTables']))
                            $arr['flextable'] = $view->getFlexTable();
                        if(isset($view->getFile()[$key]['Users']))
                            $arr['Users'] = $view->getSettingAccounts();
                        if(isset($view->getFile()[$key]['Product']))
                            $arr['Product'] = $view->getProduct();
                        $arr = htmlspecialchars(json_encode($arr));
                        echo <<<HTML
                        <option {$select} data-value="{$arr}" value="{$key}">
                            {$name['Name']}
                        </option>
                        HTML;
                    }
            echo<<<HTML
                </select>
            </div>
            HTML;
            echo'<div id="myOption">';
                if(isset($view->getModel2()['MyFlexTables']))
                    echo <<<HTML
                        <div class="col-lg-auto pt-2">
                            <div class="form-check">
                                <input name="flextable"  class="form-check-input" value="flextable" type="checkbox">
                                <label  class="form-check-label">
                                    {$view->getFlexTable()}
                                </label>
                            </div>
                        </div>
                    
                    HTML;
                if(isset($view->getObj()['Users']))
                    echo <<<HTML
                        <div class="col-lg-auto pt-2">
                            <div class="form-check">
                                <input name="Users"  class="form-check-input" value="Users" type="checkbox">
                                <label  class="form-check-label">
                                    {$view->getSettingAccounts()}
                                </label>
                            </div>
                        </div>
                    HTML;
                if(isset($view->getObj()['Product']))
                    echo <<<HTML
                        <div class="col-lg-auto pt-2">
                            <div class="form-check">
                                <input name="Product"  class="form-check-input" value="Product" type="checkbox">
                                <label  class="form-check-label">
                                    {$view->getProduct()}
                                </label>
                            </div>
                        </div>
                    HTML;
            echo'</div></div></div>';
            include('all_modal/end_model.php');
    }
}
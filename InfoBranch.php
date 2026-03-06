<?php
trait InfoBranch{
    private $branchInputOutput;
    private $LabelBranchRaysName;
    private $LabelBranchRaysPhone;
    private $LabelBranchRaysCountry;
    private $LabelBranchRaysGovernments;
    private $LabelBranchRaysCity;
    private $LabelBranchRaysStreet;
    private $LabelBranchRaysBuilding;
    private $LabelBranchRaysAddress;
    private $LabelWithRaysOut;

    private $BranchRaysName;
    private $BranchRaysPhone;
    private $BranchRaysCountry;
    private $BranchRaysGovernments;
    private $BranchRaysCity;
    private $BranchRaysStreet;
    private $BranchRaysBuilding;
    private $BranchRaysAddress;
    private $selectBox1;
    function initInfoBranch($modal){
        $this->branchInputOutput = $modal->getModel2()['SelectBranchBox'];
        $this->LabelBranchRaysName = $modal->getModelPage()['LabelBranchRaysName'];
        $this->LabelBranchRaysPhone = $modal->getModelPage()['LabelBranchRaysPhone'];
        $this->LabelBranchRaysCountry = $modal->getModelPage()['LabelBranchRaysCountry'];
        $this->LabelBranchRaysGovernments = $modal->getModelPage()['LabelBranchRaysGovernments'];
        $this->LabelBranchRaysCity = $modal->getModelPage()['LabelBranchRaysCity'];
        $this->LabelBranchRaysStreet = $modal->getModelPage()['LabelBranchRaysStreet'];
        $this->LabelBranchRaysBuilding = $modal->getModelPage()['LabelBranchRaysBuilding'];
        $this->LabelBranchRaysAddress = $modal->getModelPage()['LabelBranchRaysAddress'];
        $this->LabelWithRaysOut = $modal->getModelPage()['LabelWithRaysOut'];
        $this->BranchRaysName = $modal->getModelPage()['BranchRaysName'];
        $this->BranchRaysPhone = $modal->getModelPage()['BranchRaysPhone'];
        $this->BranchRaysCountry = $modal->getModelPage()['BranchRaysCountry'];
        $this->BranchRaysGovernments = $modal->getModelPage()['BranchRaysGovernments'];
        $this->BranchRaysCity = $modal->getModelPage()['BranchRaysCity'];
        $this->BranchRaysStreet = $modal->getModelPage()['BranchRaysStreet'];
        $this->BranchRaysBuilding = $modal->getModelPage()['BranchRaysBuilding'];
        $this->BranchRaysAddress = $modal->getModelPage()['BranchRaysAddress'];
        $this->selectBox1 = $modal->getModelPage()['WithRaysOut'];  
    }
    function getbranchInputOutput(){
        return $this->branchInputOutput;
    }
    function getLabelBranchRaysName(){
        return $this->LabelBranchRaysName;
    }
    function getLabelBranchRaysPhone(){
        return $this->LabelBranchRaysPhone;
    }
    function getLabelBranchRaysCountry(){
        return $this->LabelBranchRaysCountry;
    }
    function getLabelBranchRaysGovernments(){
        return $this->LabelBranchRaysGovernments;
    }
    function getLabelBranchRaysCity(){
        return $this->LabelBranchRaysCity;
    }
    function getLabelBranchRaysStreet(){
        return $this->LabelBranchRaysStreet;
    }
    function getLabelBranchRaysBuilding(){
        return $this->LabelBranchRaysBuilding;
    }
    function getLabelBranchRaysAddress(){
        return $this->LabelBranchRaysAddress;
    }
    function getLabelWithRaysOut(){
        return $this->LabelWithRaysOut;
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
    
}
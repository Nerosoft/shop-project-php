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
    function initInfoBranch(){
        $this->branchInputOutput = $this->getModel2()['SelectBranchBox'];
        $this->LabelBranchRaysName = $this->getModelPage()['LabelBranchRaysName'];
        $this->LabelBranchRaysPhone = $this->getModelPage()['LabelBranchRaysPhone'];
        $this->LabelBranchRaysCountry = $this->getModelPage()['LabelBranchRaysCountry'];
        $this->LabelBranchRaysGovernments = $this->getModelPage()['LabelBranchRaysGovernments'];
        $this->LabelBranchRaysCity = $this->getModelPage()['LabelBranchRaysCity'];
        $this->LabelBranchRaysStreet = $this->getModelPage()['LabelBranchRaysStreet'];
        $this->LabelBranchRaysBuilding = $this->getModelPage()['LabelBranchRaysBuilding'];
        $this->LabelBranchRaysAddress = $this->getModelPage()['LabelBranchRaysAddress'];
        $this->LabelWithRaysOut = $this->getModelPage()['LabelWithRaysOut'];
        $this->BranchRaysName = $this->getModelPage()['BranchRaysName'];
        $this->BranchRaysPhone = $this->getModelPage()['BranchRaysPhone'];
        $this->BranchRaysCountry = $this->getModelPage()['BranchRaysCountry'];
        $this->BranchRaysGovernments = $this->getModelPage()['BranchRaysGovernments'];
        $this->BranchRaysCity = $this->getModelPage()['BranchRaysCity'];
        $this->BranchRaysStreet = $this->getModelPage()['BranchRaysStreet'];
        $this->BranchRaysBuilding = $this->getModelPage()['BranchRaysBuilding'];
        $this->BranchRaysAddress = $this->getModelPage()['BranchRaysAddress'];
        $this->selectBox1 = $this->getModelPage()['WithRaysOut'];  
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
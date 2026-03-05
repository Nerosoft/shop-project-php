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
    function initInfoBranch($info, $SelectBranchBox){
        $this->branchInputOutput = $SelectBranchBox;
        $this->LabelBranchRaysName = $info['LabelBranchRaysName'];
        $this->LabelBranchRaysPhone = $info['LabelBranchRaysPhone'];
        $this->LabelBranchRaysCountry = $info['LabelBranchRaysCountry'];
        $this->LabelBranchRaysGovernments = $info['LabelBranchRaysGovernments'];
        $this->LabelBranchRaysCity = $info['LabelBranchRaysCity'];
        $this->LabelBranchRaysStreet = $info['LabelBranchRaysStreet'];
        $this->LabelBranchRaysBuilding = $info['LabelBranchRaysBuilding'];
        $this->LabelBranchRaysAddress = $info['LabelBranchRaysAddress'];
        $this->LabelWithRaysOut = $info['LabelWithRaysOut'];
        $this->BranchRaysName = $info['BranchRaysName'];
        $this->BranchRaysPhone = $info['BranchRaysPhone'];
        $this->BranchRaysCountry = $info['BranchRaysCountry'];
        $this->BranchRaysGovernments = $info['BranchRaysGovernments'];
        $this->BranchRaysCity = $info['BranchRaysCity'];
        $this->BranchRaysStreet = $info['BranchRaysStreet'];
        $this->BranchRaysBuilding = $info['BranchRaysBuilding'];
        $this->BranchRaysAddress = $info['BranchRaysAddress'];
        $this->selectBox1 = $info['WithRaysOut'];  
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
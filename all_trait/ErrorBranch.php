<?php
trait ErrorBranch{
    private $BranceRaysNameRequired;
    private $BranceRaysPhoneRequired;
    private $BranceRaysGovernmentsRequired;
    private $BranceRaysCityRequired;
    private $BranceRaysStreetRequired;
    private $BranceRaysBuildingRequired;
    private $BranceRaysAddressRequired;
    private $BranceRaysCountryRequired;
    private $BranceRaysFollowRequired;
    private $BranceRaysNameLength;
    private $BranceRaysPhoneLength;
    private $BranceRaysGovernmentsLength;
    private $BranceRaysCityLength;
    private $BranceRaysStreetLength;
    private $BranceRaysBuildingLength;
    private $BranceRaysAddressLength;
    private $BranceRaysCountryLength;
    function initErrorBranch(){
        $this->BranceRaysNameRequired = $this->getModelPage()['BranceRaysNameRequired'];
        $this->BranceRaysNameLength = $this->getModelPage()['BranceRaysNameLength'];
        $this->BranceRaysPhoneRequired = $this->getModelPage()['BranceRaysPhoneRequired'];
        $this->BranceRaysPhoneLength = $this->getModelPage()['BranceRaysPhoneLength'];
        $this->BranceRaysCountryRequired = $this->getModelPage()['BranceRaysCountryRequired'];
        $this->BranceRaysCountryLength = $this->getModelPage()['BranceRaysCountryLength'];
        $this->BranceRaysGovernmentsRequired = $this->getModelPage()['BranceRaysGovernmentsRequired'];
        $this->BranceRaysGovernmentsLength = $this->getModelPage()['BranceRaysGovernmentsLength'];
        $this->BranceRaysCityRequired = $this->getModelPage()['BranceRaysCityRequired'];
        $this->BranceRaysCityLength = $this->getModelPage()['BranceRaysCityLength'];
        $this->BranceRaysStreetRequired = $this->getModelPage()['BranceRaysStreetRequired'];
        $this->BranceRaysStreetLength = $this->getModelPage()['BranceRaysStreetLength'];
        $this->BranceRaysBuildingRequired = $this->getModelPage()['BranceRaysBuildingRequired'];
        $this->BranceRaysBuildingLength = $this->getModelPage()['BranceRaysBuildingLength'];
        $this->BranceRaysAddressRequired = $this->getModelPage()['BranceRaysAddressRequired'];
        $this->BranceRaysAddressLength = $this->getModelPage()['BranceRaysAddressLength'];
        $this->BranceRaysFollowRequired = $this->getModelPage()['BranceRaysFollowRequired'];
    }
    function validInputs(){
        $this->initErrorBranch();
        if(!isset($_POST['Name']) || $_POST['Name'] === '')
            $this->showError($this->getBranceRaysNameRequired());
        else if(strlen($_POST['Name']) < 3)
            $this->showError($this->getBranceRaysNameLength());
        else if(!isset($_POST['Phone']) || $_POST['Phone'] === '')
            $this->showError($this->getBranceRaysPhoneRequired());
        else if(!preg_match('/^[0-9]{11}$/', $_POST['Phone']))
            $this->showError($this->getBranceRaysPhoneLength());
        else if(!isset($_POST['Country']) || $_POST['Country'] === '')
            $this->showError($this->getBranceRaysCountryRequired());
        else if(strlen($_POST['Country']) < 3)
            $this->showError($this->getBranceRaysCountryLength());
        else if(!isset($_POST['Governments']) || $_POST['Governments'] === '')
            $this->showError($this->getBranceRaysGovernmentsRequired());
        else if(strlen($_POST['Governments']) < 3)
            $this->showError($this->getBranceRaysGovernmentsLength());
        else if(!isset($_POST['City']) || $_POST['City'] === '')
            $this->showError($this->getBranceRaysCityRequired());
        else if(strlen($_POST['City']) < 3)
            $this->showError($this->getBranceRaysCityLength());
        else if(!isset($_POST['Street']) || $_POST['Street'] === '')
            $this->showError($this->getBranceRaysStreetRequired());
        else if(strlen($_POST['Street']) < 3)
            $this->showError($this->getBranceRaysStreetLength());
        else if(!isset($_POST['Building']) || $_POST['Building'] === '')
            $this->showError($this->getBranceRaysBuildingRequired());
        else if(strlen($_POST['Building']) < 3)
            $this->showError($this->getBranceRaysBuildingLength());
        else if(!isset($_POST['Address']) || $_POST['Address'] === '')
            $this->showError($this->getBranceRaysAddressRequired());
        else if(strlen($_POST['Address']) < 3)
            $this->showError($this->getBranceRaysAddressLength());
        else if(!isset($_POST['Follow']))
            $this->showError($this->getBranceRaysFollowRequired());
        else if(!isset($this->getModel2()['Branches']['SelectBranchBox'][$_POST['Follow']]))
            $this->showError($this->getModelPage()['BranceRaysFollowValue']);
        else if(ModelJson::getFileName() === 'BranchCreatePost' && !isset($_POST['selectedBranch']))
            $this->showError($this->getModelPage()['IdBranchReq']);
        else if(ModelJson::getFileName() === 'BranchCreatePost' && !isset($this->getBranch()[$_POST['selectedBranch']]))
            $this->showError($this->getModelPage()['IdBranchInv']);
    }
    function initErrorBranch2(){
        $this->validInputs();
        $myBranch = $this->getFile();
        $myBranch[$this->getFixedId()]['Branches'][$this->keyId] = array(
            "Name"=>$_POST["Name"],
            "Phone"=>$_POST["Phone"],
            "Country"=>$_POST["Country"],
            "Governments"=>$_POST["Governments"],
            "City"=>$_POST["City"],
            "Street"=>$_POST["Street"],
            "Building"=>$_POST["Building"],
            "Address"=>$_POST["Address"],
            "Follow"=>$_POST["Follow"]
        );
        $this->saveVarFile($myBranch);
    }
    function getBranceRaysNameRequired(){
        return $this->BranceRaysNameRequired;
    }
    function getBranceRaysPhoneRequired(){
        return $this->BranceRaysPhoneRequired;
    }
    function getBranceRaysGovernmentsRequired(){
        return $this->BranceRaysGovernmentsRequired;
    }
    function getBranceRaysCityRequired(){
        return $this->BranceRaysCityRequired;
    }
    function getBranceRaysStreetRequired(){
        return $this->BranceRaysStreetRequired;
    }
    function getBranceRaysBuildingRequired(){
        return $this->BranceRaysBuildingRequired;
    }
    function getBranceRaysAddressRequired(){
        return $this->BranceRaysAddressRequired;
    }
    function getBranceRaysCountryRequired(){
        return $this->BranceRaysCountryRequired;
    }
    function getBranceRaysFollowRequired(){
        return $this->BranceRaysFollowRequired;
    }
    function getBranceRaysNameLength(){
        return $this->BranceRaysNameLength;
    }
    function getBranceRaysPhoneLength(){
        return $this->BranceRaysPhoneLength;
    }
    function getBranceRaysGovernmentsLength(){
        return $this->BranceRaysGovernmentsLength;
    }
    function getBranceRaysCityLength(){
        return $this->BranceRaysCityLength;
    }
    function getBranceRaysStreetLength(){
        return $this->BranceRaysStreetLength;
    }
    function getBranceRaysBuildingLength(){
        return $this->BranceRaysBuildingLength;
    }
    function getBranceRaysAddressLength(){
        return $this->BranceRaysAddressLength;
    }
    function getBranceRaysCountryLength(){
        return $this->BranceRaysCountryLength;
    }
}
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
    function initErrorBranch($error){
        $this->BranceRaysNameRequired = $error['BranceRaysNameRequired'];
        $this->BranceRaysNameLength = $error['BranceRaysNameLength'];
        $this->BranceRaysPhoneRequired = $error['BranceRaysPhoneRequired'];
        $this->BranceRaysPhoneLength = $error['BranceRaysPhoneLength'];
        $this->BranceRaysCountryRequired = $error['BranceRaysCountryRequired'];
        $this->BranceRaysCountryLength = $error['BranceRaysCountryLength'];
        $this->BranceRaysGovernmentsRequired = $error['BranceRaysGovernmentsRequired'];
        $this->BranceRaysGovernmentsLength = $error['BranceRaysGovernmentsLength'];
        $this->BranceRaysCityRequired = $error['BranceRaysCityRequired'];
        $this->BranceRaysCityLength = $error['BranceRaysCityLength'];
        $this->BranceRaysStreetRequired = $error['BranceRaysStreetRequired'];
        $this->BranceRaysStreetLength = $error['BranceRaysStreetLength'];
        $this->BranceRaysBuildingRequired = $error['BranceRaysBuildingRequired'];
        $this->BranceRaysBuildingLength = $error['BranceRaysBuildingLength'];
        $this->BranceRaysAddressRequired = $error['BranceRaysAddressRequired'];
        $this->BranceRaysAddressLength = $error['BranceRaysAddressLength'];
        $this->BranceRaysFollowRequired = $error['BranceRaysFollowRequired'];
    }
    function initErrorBranch2($modal, $keyId){
        $this->initErrorBranch($modal->getModelPage());
        if(!isset($_POST['Name']) || $_POST['Name'] === '')
            MyBranch::initBranch($this->getBranceRaysNameRequired(), 'danger');
        else if(strlen($_POST['Name']) < 3)
            MyBranch::initBranch($this->getBranceRaysNameLength(), 'danger');
        else if(!isset($_POST['Phone']) || $_POST['Phone'] === '')
            MyBranch::initBranch($this->getBranceRaysPhoneRequired(), 'danger');
        else if(!preg_match('/^[0-9]{11}$/', $_POST['Phone']))
            MyBranch::initBranch($this->getBranceRaysPhoneLength(), 'danger');
        else if(!isset($_POST['Country']) || $_POST['Country'] === '')
            MyBranch::initBranch($this->getBranceRaysCountryRequired(), 'danger');
        else if(strlen($_POST['Country']) < 3)
            MyBranch::initBranch($this->getBranceRaysCountryLength(), 'danger');
        else if(!isset($_POST['Governments']) || $_POST['Governments'] === '')
            MyBranch::initBranch($this->getBranceRaysGovernmentsRequired(), 'danger');
        else if(strlen($_POST['Governments']) < 3)
            MyBranch::initBranch($this->getBranceRaysGovernmentsLength(), 'danger');
        else if(!isset($_POST['City']) || $_POST['City'] === '')
            MyBranch::initBranch($this->getBranceRaysCityRequired(), 'danger');
        else if(strlen($_POST['City']) < 3)
            MyBranch::initBranch($this->getBranceRaysCityLength(), 'danger');
        else if(!isset($_POST['Street']) || $_POST['Street'] === '')
            MyBranch::initBranch($this->getBranceRaysStreetRequired(), 'danger');
        else if(strlen($_POST['Street']) < 3)
            MyBranch::initBranch($this->getBranceRaysStreetLength(), 'danger');
        else if(!isset($_POST['Building']) || $_POST['Building'] === '')
            MyBranch::initBranch($this->getBranceRaysBuildingRequired(), 'danger');
        else if(strlen($_POST['Building']) < 3)
            MyBranch::initBranch($this->getBranceRaysBuildingLength(), 'danger');
        else if(!isset($_POST['Address']) || $_POST['Address'] === '')
            MyBranch::initBranch($this->getBranceRaysAddressRequired(), 'danger');
        else if(strlen($_POST['Address']) < 3)
            MyBranch::initBranch($this->getBranceRaysAddressLength(), 'danger');
        else if(!isset($_POST['Follow']) || $_POST['Follow'] === '')
            MyBranch::initBranch($this->getBranceRaysFollowRequired(), 'danger');
        else if(!isset($this->getModel2()['SelectBranchBox'][$_POST['Follow']]))
            MyBranch::initBranch($modal->getModelPage()['BranceRaysFollowValue'], 'danger');
        else{
            $file = $modal->getFile();
            $file[$modal->getFixedId()]['Branches'][$keyId] = array(
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
            return $file;
        }
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
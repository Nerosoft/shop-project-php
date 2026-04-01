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
    function validInputs($modal){
        $this->initErrorBranch($modal->getModelPage());
        if(!isset($_POST['Name']) || $_POST['Name'] === '')
            $modal->initViewPost($this->getBranceRaysNameRequired());
        else if(strlen($_POST['Name']) < 3)
            $modal->initViewPost($this->getBranceRaysNameLength());
        else if(!isset($_POST['Phone']) || $_POST['Phone'] === '')
            $modal->initViewPost($this->getBranceRaysPhoneRequired());
        else if(!preg_match('/^[0-9]{11}$/', $_POST['Phone']))
            $modal->initViewPost($this->getBranceRaysPhoneLength());
        else if(!isset($_POST['Country']) || $_POST['Country'] === '')
            $modal->initViewPost($this->getBranceRaysCountryRequired());
        else if(strlen($_POST['Country']) < 3)
            $modal->initViewPost($this->getBranceRaysCountryLength());
        else if(!isset($_POST['Governments']) || $_POST['Governments'] === '')
            $modal->initViewPost($this->getBranceRaysGovernmentsRequired());
        else if(strlen($_POST['Governments']) < 3)
            $modal->initViewPost($this->getBranceRaysGovernmentsLength());
        else if(!isset($_POST['City']) || $_POST['City'] === '')
            $modal->initViewPost($this->getBranceRaysCityRequired());
        else if(strlen($_POST['City']) < 3)
            $modal->initViewPost($this->getBranceRaysCityLength());
        else if(!isset($_POST['Street']) || $_POST['Street'] === '')
            $modal->initViewPost($this->getBranceRaysStreetRequired());
        else if(strlen($_POST['Street']) < 3)
            $modal->initViewPost($this->getBranceRaysStreetLength());
        else if(!isset($_POST['Building']) || $_POST['Building'] === '')
            $modal->initViewPost($this->getBranceRaysBuildingRequired());
        else if(strlen($_POST['Building']) < 3)
            $modal->initViewPost($this->getBranceRaysBuildingLength());
        else if(!isset($_POST['Address']) || $_POST['Address'] === '')
            $modal->initViewPost($this->getBranceRaysAddressRequired());
        else if(strlen($_POST['Address']) < 3)
            $modal->initViewPost($this->getBranceRaysAddressLength());
        else if(!isset($_POST['Follow']) || $_POST['Follow'] === '')
            $modal->initViewPost($this->getBranceRaysFollowRequired());
        else if(!isset($modal->getModel2()['SelectBranchBox'][$_POST['Follow']]))
            $modal->initViewPost($modal->getModelPage()['BranceRaysFollowValue']);
    }
    function initErrorBranch2($modal, $keyId){
        $this->validInputs($modal);
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
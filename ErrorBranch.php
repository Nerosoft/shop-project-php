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
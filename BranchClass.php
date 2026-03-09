<?php

class Branch implements DeleteInfoName
{
    /**
     * Create a new class instance.
     */
    private $Name;
    private $Phone;
    private $Governments;
    private $City;
    private $Street;
    private $Building;
    private $Address;
    private $Country;
    private $Follow;
    function __construct($Name, $Phone, $Governments, $City, $Street, $Building, $Address, $Country, $Follow)
    {
        $this->Name = $Name;
        $this->Phone = $Phone;
        $this->Governments = $Governments;
        $this->City = $City;
        $this->Street = $Street;
        $this->Building = $Building;
        $this->Address = $Address;
        $this->Country = $Country;
        $this->Follow = $Follow;
    }
    function getName(){
        return $this->Name;
    }
    function getPhone(){
        return $this->Phone;
    }
    function getGovernments(){
        return $this->Governments;
    }
    function getCity(){
        return $this->City;
    }
    function getStreet(){
        return $this->Street;
    }
    function getBuilding(){
        return $this->Building;
    }
    function getAddress(){
        return $this->Address;
    }
    function getCountry(){
        return $this->Country;
    }
    function getFollowId(){
        return $this->Follow;
    }
    static function fromArray($myBranch, $follow){
        $allBranch = array();
        foreach ($myBranch as $key => $branch)
            $allBranch[$key] = new Branch($branch['Name'], $branch['Phone'], $branch['Governments'],
                $branch['City'], $branch['Street'], $branch['Building'], $branch['Address'],
                $branch['Country'], $follow[$branch['Follow']]);        
        return $allBranch;
    }
}

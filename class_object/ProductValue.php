<?php
class ProductValue implements DeleteInfoName{
    private $Name;
    private $Descreption;
    private $Salary;
    private $Category;
    function __construct($Name = null, $Descreption = null, $Salary = null, $Category = null){
        $this->Name = $Name;
        $this->Descreption = $Descreption;
        $this->Salary = $Salary;
        $this->Category = $Category;
    }
    function getName(){
        return $this->Name;
    }
    function getDescreption(){
        return $this->Descreption;
    }
    function getSalary(){
        return $this->Salary;
    }
    function getCategory(){
        return $this->Category;
    }
    static function fromArray($productes){
        $arr = array();
        foreach ($productes as $key => $product) 
            $arr[$key] = new ProductValue(...$product);
        return $arr;
    }
    function getObj(){
        return json_encode(get_object_vars($this));
    }
    static function getKeysObject(){
        return array('Image', ...array_keys(get_object_vars(new static())));
    }
}
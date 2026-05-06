<?php
class MyLanguage
{
    private $name;
    function __construct($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }
    static function fromArray($myLanguage) {
        $lang = array();
        foreach ($myLanguage as $key=>$value)
            $lang[$key] =  new MyLanguage($value);
        return $lang;
    }
}

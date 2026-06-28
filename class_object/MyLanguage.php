<?php
class MyLanguage
{
    private $name;
    function __construct($name = null){
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
    function getObj(){
        return json_encode(get_object_vars($this));
    }
    static function getKeysObject(){
        return array_keys(get_object_vars(new static()));
    }
}

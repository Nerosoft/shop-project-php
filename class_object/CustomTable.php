<?php
class CustomTable implements DeleteInfoName
{
    /**
     * Create a new class instance.
     */
    private $name;
    public function __construct($Name = null)
    {
        $this->name = $Name;
    }

    public function getName(){
        return $this->name;
    }
    public static function fromArray($obj) {
        $CustomTable = array();
        foreach ($obj->getModel2()['MyFlexTables'] as $key=>$value)
            $CustomTable[$key] =  new CustomTable($value);
        return $CustomTable;
    }
    function getObj(){
        return json_encode(get_object_vars($this));
    }
    static function getKeysObject(){
        return count(get_object_vars(new static()));
    }
}
<?php
class CustomTable
{
    /**
     * Create a new class instance.
     */
    private $Name;
    public function __construct($Name)
    {
        $this->Name = $Name;
    }

    public function getName(){
        return $this->Name;
    }
    public static function fromArray($obj) {
        $CustomTable = array();
        foreach ($obj->getModel2()['MyFlexTables'] as $key=>$value)
            $CustomTable[$key] =  new CustomTable($value);
        return $CustomTable;
    }
}
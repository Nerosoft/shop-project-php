<?php
class Users implements DeleteInfoName
{
    /**
     * Create a new class instance.
     */
    private $Email;
    private $Password;
    private $Key;
    function __construct($Email = null, $Password = null, $Key = null)
    {
        $this->Email = $Email;
        $this->Password = $Password;
        $this->Key = $Key;
    }
    function getName(){
        return $this->Email;
    }
    function getPassword(){
        return $this->Password;
    }
    function getKey(){
        return $this->Key;
    }
    static function fromArray($users){
        $arr = array();
        foreach ($users as $key => $user)
            $arr[$key] = new Users(...$user);
        return $arr;
    }
    function getObj(){
        return json_encode(get_object_vars($this));
    }
    static function getKeysObject(){
        return count(get_object_vars(new static()));
    }
}

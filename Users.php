<?php
class Users implements DeleteInfoName
{
    /**
     * Create a new class instance.
     */
    private $Email;
    private $Password;
    private $Key;
    function __construct($Email, $Password, $Key)
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
            $arr[$key] = new Users($user['Email'], $user['Password'], $user['Key']);
        return $arr;
    }
}

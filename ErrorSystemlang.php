<?php
trait ErrorSystemlang{
    private $TextRequired;
    private $TextLenght;
    function initErrorSystemlang($error){
        $this->TextRequired = $error['TextRequired'];
        $this->TextLenght = $error['TextLenght'];
    }
     function getTextRequired(){
        return $this->TextRequired;
    }
    function getTextLenght(){
        return $this->TextLenght;
    }
}
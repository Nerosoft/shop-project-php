<?php
trait ErrorSystemlang{
    private $TextRequired;
    private $TextLenght;
    function initErrorSystemlang(){
        $this->TextRequired = $this->getModelPage()['TextRequired'];
        $this->TextLenght = $this->getModelPage()['TextLenght'];
    }
    function getTextRequired(){
        return $this->TextRequired;
    }
    function getTextLenght(){
        return $this->TextLenght;
    }
}
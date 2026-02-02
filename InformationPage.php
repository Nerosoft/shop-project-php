<?php
require 'ModelJson.php';
require 'MyLanguage.php';
class InformationPage extends ModelJson{
    private $Title;
    private $Style;
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->Title = $this->getModelPage()['Title'];
        $this->Style = MyLanguage::fromArray($this->getModel2()['Style']);
        include 'start_html.php';
    }
    function getTitle(){
        return $this->Title;
    }
    function setTitle($title){
        return $this->Title = $title;
    }
    function getStyle(){
        return $this->Style;
    }
}
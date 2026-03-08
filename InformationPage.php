<?php
require 'ModelJson.php';
require 'MyLanguage.php';
class InformationPage extends ModelJson{
    private $Title;
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->Title = $this->getModelPage()['Title'];
        include 'start_html.php';
    }
    function getTitle(){
        return $this->Title;
    }
    function setTitle($title){
        return $this->Title = $title;
    }
}
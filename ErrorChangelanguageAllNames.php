<?php
trait ErrorChangelanguageAllNames{
    private $allNames;
    function initErrorChangelanguageAllNames($AllNamesLanguage){
        $this->allNames = $AllNamesLanguage;
    }
    function getallNames(){
        return $this->allNames;
    }
}
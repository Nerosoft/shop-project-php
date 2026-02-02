<?php
require 'ErrorChangelanguageAllNames.php';
trait ErrorChangelanguage{
    use ErrorChangelanguageAllNames;
    private $NewLangNameRequired;
    private $NewLangNameInvalid;
    function initErrorChangelanguage($info, $AllNamesLanguage){
        $this->NewLangNameRequired = $info['NewLangNameRequired'];
        $this->NewLangNameInvalid = $info['NewLangNameInvalid'];
        $this->initErrorChangelanguageAllNames($AllNamesLanguage);
    }
    function getNewLangNameRequired(){
        return $this->NewLangNameRequired;
    }
    function getNewLangNameInvalid(){
        return $this->NewLangNameInvalid;
    }

}

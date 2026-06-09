<?php
require 'AdminMenu.php';
class Page extends AdminMenu{
    private $ScreenModelCreate;
    private $ButtonModelCreate;
    private $ButtonModelAdd;
    private $ScreenModelDelete;
    private $messageModelDelete;
    private $buttonModelDelete;
    private $LoadMessage;
    function __construct($IdPage, $message, $type, $DataView, $keysTable = null){
        parent::__construct($IdPage, $message, $type, $DataView, $keysTable);
        $this->ScreenModelCreate = $this->getModelPage()['ScreenModelCreate'];
        $this->ButtonModelAdd = $this->getModelPage()['ButtonModelAdd'];
        $this->ButtonModelCreate = $this->getModelPage()['ButtonModelCreate'];
        $this->ScreenModelDelete = $this->getModelPage()['ScreenModelDelete'];
        $this->messageModelDelete = $this->getModelPage()['MessageModelDelete'];
        $this->buttonModelDelete = $this->getModelPage()['ButtonModelDelete'];
        echo <<<HTML
            <button onclick="openForm('#createModel')" class="btn btn-primary">{$this->getModelPage()['ButtonModelCreate']}</button>
        HTML;
    }
    function getScreenModelCreate(){
        return $this->ScreenModelCreate;
    }
    function getButtonModelCreate(){
        return $this->ButtonModelCreate;
    }
    function getButtonModelAdd(){
        return $this->ButtonModelAdd;
    }
    function getScreenModelDelete(){
        return $this->ScreenModelDelete;
    }
    function getmessageModelDelete(){
        return $this->messageModelDelete;
    }
    function getbuttonModelDelete(){
        return $this->buttonModelDelete;
    }
    function getLoadMessage(){
        return $this->LoadMessage;
    }
}
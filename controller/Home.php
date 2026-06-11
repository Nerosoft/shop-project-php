<?php
require 'AdminMenu.php';
require 'class_object/CustomTable.php';
require 'all_trait/ErrorsHome.php';
include 'interface/InterfaceDataView.php';
class MyHome extends AdminMenu implements InterfaceDataView{
    use ErrorsHome;
    private $TableName;
    private $LabelInputNumber;
    private $HintInputNumber;
    private $LabelName;
    private $HintName;
    function __construct($message, $type){
        parent::__construct('Home', $message, $type, function(){
            $this->initErrorsHome();
            $this->LabelName = $this->getModelPage()['LabelName'];
            $this->HintName = $this->getModelPage()['HintName'];
            $this->TableName = $this->getModelPage()['NameTable'];
            $this->LabelInputNumber = $this->getModelPage()['LabelInputNumber'];
            $this->HintInputNumber = $this->getModelPage()['HintInputNumber'];
            return isset($this->getModel2()['MyFlexTables'])?array_reverse(CustomTable::fromArray($this)):array();
        }, CustomTable::getKeysObject(), function($view, $title, $button){
            $action = 'HomeCreatePost.php';
            include('all_modal/modal_custome_table.php');
            echo <<<HTML
                <div class="form-group">
                    <label for="lang_name" class="form-label">{$view->getLabelInputNumber()}</label>
                    <input 
                    title='{$view->getHintInputNumber()}'
                    min="1" 
                    max="8" 
                    required
                    type="number" name="input_number" id="input_number"  placeholder='{$view->getHintInputNumber()}' class="form-control">
                </div>
            HTML;
            include('all_modal/end_model.php');
        });
    }
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
    function getTableName(){
        return $this->TableName;
    }
    function getLabelInputNumber(){
        return $this->LabelInputNumber;
    }
    function getHintInputNumber(){
        return $this->HintInputNumber;
    }
    function printTableNames(){
        echo<<<HTML
        <th>{$this->getTableName()}</th>
        HTML;
    }
}
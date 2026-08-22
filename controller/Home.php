<?php
// require 'auth/test_session2.php';
require 'class_object/CustomTable.php';
class MyHome extends ModelJson{
    function __construct(){
        parent::__construct('Home', CustomTable::getKeysObject());
    }
    function getMyDataView(){
        return isset($this->getModel2()['MyFlexTables'])?array_reverse(CustomTable::fromArray($this)):array();
    }
    function getView(){
        include 'view/home.php';
        echo '</tbody></table></div>';
    }
    function getLabelName(){
        return $this->getModelPage()['LabelName'];
    }
    function getHintName(){
        return $this->getModelPage()['HintName'];
    }
    function getLabelInputNumber(){
        return $this->getModelPage()['LabelInputNumber'];
    }
    function getHintInputNumber(){
        return $this->getModelPage()['HintInputNumber'];
    }
    function makeCreateModal($title, $button){
            $action = 'HomeCreatePost.php';
            include('all_modal/modal_custome_table.php');
            echo <<<HTML
                <div class="form-group">
                    <i class="fa fa-home fa-2x"></i>
                    <label for="lang_name" class="form-label">{$this->getLabelInputNumber()}</label>
                    <input 
                    title='{$this->getHintInputNumber()}'
                    min="1" 
                    max="8" 
                    required
                    type="number" name="input_number" id="input_number"  placeholder='{$this->getHintInputNumber()}' class="form-control">
                </div>
            HTML;
            include('all_modal/end_model.php');
    }
}
$view = new MyHome();

<?php
require 'class_object/CustomTable.php';
// require 'all_trait/ErrorsHome.php';
include 'interface/InterfaceDataView.php';
class MyHome extends AdminMenu implements InterfaceDataView{
    use ErrorsHome;
    private $LabelInputNumber;
    private $HintInputNumber;
    private $LabelName;
    private $HintName;
    function __construct(){
        parent::__construct('Home', function(){
            $this->initErrorsHome();
            $this->LabelName = $this->getModelPage()['LabelName'];
            $this->HintName = $this->getModelPage()['HintName'];
            $this->LabelInputNumber = $this->getModelPage()['LabelInputNumber'];
            $this->HintInputNumber = $this->getModelPage()['HintInputNumber'];
            return isset($this->getModel2()['MyFlexTables'])?array_reverse(CustomTable::fromArray($this)):array();
        }, CustomTable::getKeysObject());
    }
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
    function getLabelInputNumber(){
        return $this->LabelInputNumber;
    }
    function getHintInputNumber(){
        return $this->HintInputNumber;
    }
    function makeCreateModal($view, $title, $button){
            $action = 'HomeCreatePost.php';
            include('all_modal/modal_custome_table.php');
            echo <<<HTML
                <div class="form-group">
                    <i class="fa fa-home fa-2x"></i>
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
    }
}


$view = new MyHome();
foreach ($view->getMyDataView() as $index => $myObject) {
    echo <<<HTML
        <tr>
            <td>$count</td>
            <td>{$myObject->getName()}</td>
            <td>
    HTML;
    $title = $view->getScreenModelEdit();
    $button = $view->getButtonModelEdit();
    $action = 'HomeEditPost.php';
    $idModel = "editModel".$index;
    include('all_modal/modal_custome_table.php');
    include('all_modal/end_model.php');
    include 'pis_of_page/button_edit.php';
}
?>                       
<script type="text/javascript">
$(document).ready(function(){    
    $('#input_number').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo$view->getInputNumberTableIsReq()?>');
        else if (this.value < 1 || this.value > 8)
            this.setCustomValidity('<?php echo$view->getInputNumberTableIsInv()?>');
        else
            this.setCustomValidity('');
    })});
</script>